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
          $usaha = \App\Models\Umkm::where('nama_member','LIKE','%'.$request->cari.'%')->get();
      }
      else
      {
          $usaha = Umkm::all();
      }   
      return view ('admin/usaha', ['usaha' => $usaha]);
  }
}   