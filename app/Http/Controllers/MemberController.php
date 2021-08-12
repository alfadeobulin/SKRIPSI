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
            'id_member' => 'required|min:3|unique:member',
            'nama_member' => 'required',
            'email' => 'required|email|unique:users',
            'nohp_member' => 'required|max:12',
            'alamat_member' => 'required',
            'id_admin' => 'required|min:3|max:3'
        ],
        [
            'id_member.required' => 'ID member wajib di isi',
            'id_member.min'      => 'ID member minimal 3 karakter',
            'id_member.unique'   => 'ID member sudah terdaftar',
            'nama_member.required'   => 'Nama wajib di isi',
            'nohp_member.required' => 'No HP wajib di isi',
            'nohp_member.max' => 'No HP melebihi 12 digit',
            'email.required' => 'Email wajib di isi',
            'email.email' => 'Format Email Salah',
            'email.unique' => 'Email Sudah Digunakan',
            'alamat_member.required' => 'Alamat wajib di isi',
            'id_admin.required' => 'ID admin wajib di isi',
            'id_admin.min'      => 'ID admin minimal 3 karakter',
            'id_admin.max' => 'ID admin maksimal 3 digit',
        ]);

      $user = new \App\Models\User;
      $user->role = 'member';
      $user->name = $request->nama_member;
      $user->email = $request->email;
      $user->password = bcrypt('member123');
      $user->save();

      $member = new Member;
      $member->id_member = $request->id_member;
      $member->nama_member = $request->nama_member;
      $member->nohp_member = $request->nohp_member;
      $member->alamat_member = $request->alamat_member;
      $member->id_admin = $request->id_admin;
      $member->save();

      return redirect('/daftarmemberumkm')->with('sukses','Data berita berhasil ditambahkan');
    }
  
    public function editmember($id_member)
    {
      $member = DB::table('member')->where('id_member', $id_member)->first();
      return view ('member/editmember')->with(['member' => $member]);
    }

    public function update(Request $request, Member $member )
    {
      DB::table('member')->where('id_member',$request->id_member)->update([
        'id_member' => $request->id_member,
        'nama_member' => $request->nama_member,
        'nohp_member' => $request->nohp_member,
        'alamat_member' => $request->alamat_member,
        'avatar' => $request->avatar,
        'id_admin' => $request->id_admin]);
        
        if($request->hasFile('avatar'))
        {
          $request->file('avatar')->move('images/galeri',$request->file('avatar')->getClientOriginalName());
          $member->avatar = $request->file('avatar')->getClientOriginalName();
          $member->save();
        }
        // if($request->hasFile('avatar'))
        // {          
          
        //   // $avatar = new \stdClass();
        //   // $avatar->success = false;
        //   //dd($request->all());
        //   $request->file('avatar')->move('images/avatar', $request->file('avatar')->getClientOriginalName());
        //   $member->avatar  = $request->file('avatar')->getClientOriginalName();
        //   $member->save();
        // }
      return redirect('/daftarmemberumkm')->with('sukses','Data berhasil diubah!');
    }
    
    public function delete($id_member)
    {
      DB::table('member')->where('id_member', $id_member)->delete();
      return redirect('/daftarmemberumkm')->with('sukses','Data berhasil dihapus!');
    }

    public function profile($id_member)
    {
      $member = DB::table('member')->where('id_member', $id_member)->first();
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
