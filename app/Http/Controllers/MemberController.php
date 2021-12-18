<?php

namespace App\Http\Controllers;
use PDF;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Member;

use App\Exports\MemberExport;
use Maatwebsite\Excel\Facades\Excel;
use Hash;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{public function index(Request $request)
    {
        if($request->has('cari'))
        {
            $member = \App\Models\Member::where('nama_member','LIKE','%'.$request->cari.'%')->get();
        }
        else
        {
            $member = Member::all();
        }   
        return view ('admin/daftar', ['member' => $member]);
    }
    public function createmember(Request $request)
    {

      $this->validate($request,
        [
            'no_ktp' => 'required|unique:member|max:16|min:16',
            'nama_member' => 'required',
            'email' => 'required|email|unique:users',
            'nohp_member' => 'required|max:12',
            'alamat_member' => 'required'
        ],
        [
            'no_ktp.required' => 'No KTP wajib diisi dan sesuai dengan KTP anda',
            'no_ktp.max' => 'No KTP Anda melebihi 16 digit',
            'no_ktp.min' => 'No KTP anda kurang dari 16 digit',
            'no_ktp.unique' => 'No KTP ini sudah pernah digunakan',
            'nama_member.required'   => 'Nama wajib di isi',
            'nohp_member.required' => 'No HP wajib di isi',
            'nohp_member.max' => 'No HP melebihi 12 digit',
            'email.required' => 'Email wajib di isi',
            'email.email' => 'Format Email Salah',
            'email.unique' => 'Email Sudah Digunakan',
            'alamat_member.required' => 'Alamat wajib di isi'
        ]);
      
      $get_id =  DB::select('select max(id_users) as max_code from member');
      if ($get_id[0]->max_code == null) {
        $urutan = 1;
        $id_users = "M" . sprintf("%04s", $urutan);
      }else{
        $urutan = (int) substr($get_id[0]->max_code,1,4);
        $urutan++;
        $id_users = "M" . sprintf("%04s", $urutan);
      }

      $user = new \App\Models\User;
      $user->id_users = $id_users;
      $user->role = 'member';
      $user->name = $request->nama_member;
      $user->email = $request->email;
      $user->password = bcrypt('member123');
      $user->save();

      $member = new Member;
      $member->id_users = $id_users;
      $member->no_ktp = $request->no_ktp;
      $member->nama_member = $request->nama_member;
      $member->nohp_member = $request->nohp_member;
      $member->alamat_member = $request->alamat_member;
      $member->save();

      return redirect('/daftarmemberumkm')->with('sukses','Data berita berhasil ditambahkan');
    }
  
    public function editmember($id_users)
    {
      $member = DB::table('member')->where('id_users', $id_users)->first();
      return view ('member/editmember')->with(['member' => $member]);
    }

    public function update(Request $request,  $avatar )
    {
      $avatar='';
      if($request->hasFile('avatar'))
      {
        $file = $request->file('avatar');
        $filename = $file->getClientOriginalName();
        $file->move('uploads/avatar/', $filename);
        $avatar = $filename;
      }

      DB::table('member')->where('id_users',$request->id_users)->update([
        'id_users' => $request->id_users,
        'nama_member' => $request->nama_member,
        'nohp_member' => $request->nohp_member,
        'alamat_member' => $request->alamat_member,
        'avatar' => $avatar]);
      return redirect('/profilemember/profile/'.Auth::user()->id_users)->with('sukses','Data berhasil diubah!');
    }
    
    public function delete($id_users)
    {
      DB::table('member')->where('id_users', $id_users)->delete();
      return redirect('/daftarmemberumkm')->with('sukses','Data berhasil dihapus!');
    }

    public function profile($id_users)
    {
      
      $member = DB::table('member')->where('id_users', $id_users)->first();
      return view('member/profile', ['member'=>$member]);
    }

    public function exportExcel() 
    {
        ob_end_clean(); 
        ob_start();
        return Excel::download(new MemberExport, 'Member.xlsx');
    }
   
    public function exportPdf() 
    {
        $member = Member::all();
        view()->share('member', $member);
        $pdf = PDF::loadview('download/memberpdf');
        return $pdf->download('member.pdf');
        
    }
}
