<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use App\Models\Admin;
use Hash;

class AdminController extends Controller
{
  public function index(Request $request)
  {
      if($request->has('cari'))
      {
          $admin = \App\Models\Admin::where('nama_admin','LIKE','%'.$request->cari.'%')->get();
      }
      else
      {
          $admin = Admin::all();
      }   
      return view ('admin/daftaradmin', ['admin' => $admin]);
  }
  public function createadmin(Request $request)
  {
    $admin = new Admin;
    $admin->id_admin = $request->id_admin;
    $admin->nama_admin = $request->nama_admin;
    $admin->email = $request->email;
    $admin->nohp_admin = $request->nohp_admin;
    $admin->password  = Hash::make($request->password);
    $admin->save();
    return redirect('/daftaradmin')->with('sukses','Data berita berhasil ditambahkan');
  }
  
  public function delete($id_admin)
  {
      DB::table('admin')->where('id_admin', $id_admin)->delete();
      return redirect('/daftaradmin')->with('sukses','Data berhasil dihapus!');
  }
}
