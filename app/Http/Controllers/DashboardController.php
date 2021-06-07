<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        return view('umkm.visualisasi');
    }

//     public function createkecamatan(Request $request)
//   {
//     dd($request);
//     $kecamatan = new Kecamatan;
//     $kecamatan->id_kec = $request->id_kec;
//     $kecamatan->nama_kec = $request->nama_kec;
//     $kecamatan->save();
//     return redirect('/dashboard')->with('sukses','Data berita berhasil ditambahkan');
//   }
//   public function delete($id_kec)
//   {
//     DB::table('kecamatan')->where('id_kecamatan', $id_kec)->delete();
//     return redirect('/dashboard')->with('sukses','Data berhasil dihapus!');
//   }
}
