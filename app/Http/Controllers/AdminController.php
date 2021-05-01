<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use App\Models\Admin;

class AdminController extends Controller
{
    public function index(Request $request)
  {
      if($request->has('cari'))
      {
          $member = \App\Models\Admin::where('nama','LIKE','%'.$request->cari.'%')->get();
      }
      else
      {
          $member = Admin::all();
      }   
      return view ('admin.daftar', ['member' => $member]);
  }
  public function createmember(Request $request)
  {
    $member = new Member;
    $member->id_member = $request->id_member;
    $member->nama_member = $request->nama_member;
    $member->email_member = $request->email_member;
    $member->nohp_member = $request->nohp_member;
    $member->alamat_member = $request->alamat;
    $member->password  = $request->password;
    $member->id_admin = $request->id_admin;
    $member->save();
    return redirect('/daftarmemberumkm')->with('sukses','Data berita berhasil ditambahkan');
  }

  public function editmember($id_member)
    {
      $member = DB::table('member')->where('id_member', $id_member)->first();
      return view ('admin/editmember')->with(['member' => $member]);
    }
  
  public function delete($id)
  {
    DB::table('member')->where('id_member', $id_member)->delete();
    return redirect('/daftarmemberumkm')->with('sukses','Data berhasil dihapus!');
  }
}
