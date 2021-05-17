<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use App\Models\Umkm;



class UmkmController extends Controller
{
   public function index(Request $request)
  {
    
      if($request->has('cari'))
      {
          $usaha = \App\Models\Umkm::where('nama_ush','LIKE','%'.$request->cari.'%')->get();
      }
      else
      {
          $usaha = Umkm::all();
      }   
      return view ('umkm/usaha', ['usaha' => $usaha]);
  }

  public function delete($id_usaha)
  {
    DB::table('usaha')->where('id_usaha', $id_usaha)->delete();
    return redirect('/umkm')->with('sukses','Data berhasil dihapus!');
  }
}   