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
      Adminlist::create($request->all()); 
      return redirect('/daftaradmin')->with('sukses','Data berhasil ditambahkan');
  }
  
  public function delete($id)
  {
      $admin = \App\Models\Adminlist::find($id);
      $admin->delete($admin);
      return redirect('/daftaradmin')->with('sukses','Data berhasil dihapus!');
  }
}
