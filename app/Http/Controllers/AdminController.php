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
      Admin::create($request->all()); 
      return redirect('/daftarmemberumkm')->with('sukses','Data berhasil ditambahkan');
  }
  
  public function delete($id)
  {
      $member = \App\Models\Admin::find($id);
      $member->delete($member);
      return redirect('/daftarmemberumkm')->with('sukses','Data berhasil dihapus!');
  }
}
