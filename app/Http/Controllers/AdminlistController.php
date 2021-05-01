<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use App\Models\Adminlist;

class AdminlistController extends Controller
{
    public function index(Request $request)
  {
      if($request->has('cari'))
      {
          $admin = \App\Models\Adminlist::where('nama_admin','LIKE','%'.$request->cari.'%')->get();
      }
      else
      {
          $admin = Adminlist::all();
      }   
      return view ('admin/daftaradmin', ['admin' => $admin]);
  }
  public function createadmin(Request $request)
  {
    $admin = new Adminlist;
    $admin->id_admin = $request->id_admin;
    $admin->nama_admin = $request->nama_admin;
    $admin->email_admin = $request->email_admin;
    $admin->nohp_admin = $request->nohp_admin;
    $admin->password  = $request->password;
    $admin->save();
    return redirect('/daftaradmin')->with('sukses','Data berita berhasil ditambahkan');
  }
  
  public function delete($id)
  {
      $admin = \App\Models\Adminlist::find($id);
      $admin->delete($admin);
      return redirect('/daftaradmin')->with('sukses','Data berhasil dihapus!');
  }
}
