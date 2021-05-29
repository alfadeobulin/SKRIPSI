<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Member;

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
      //$user= User::all()->toArray();
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

    public function update(Request $request)
    {

      DB::table('member')->where('id_member',$request->id_member)->update([
      'id_member' => $request->id_member,
      'nama_member' => $request->nama_member,
      'nohp_member' => $request->nohp_member,
      'alamat_member' => $request->alamat_member,
      'avatar' => $request->avatar,
      'id_admin' => $request->id_admin]);
      
      if($request->hasFile('member'))
      {
        
        // $member = new \stdClass();
        // $member->success = false;
        dd($request->all());
        $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
        $avatar->avatar = $request->file('avatar')->getClientOriginalName();
        $member->save();
      }
      
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
   
}
