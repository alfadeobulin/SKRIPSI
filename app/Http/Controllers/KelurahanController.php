<?php

namespace App\Http\Controllers;

use App\Models\Kelurahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelurahanController extends Controller
{
    public function index(Request $request)
    {
        
        if($request->has('cari'))
        {
            $kelurahan = \App\Models\Kelurahan::where('nama_kel','LIKE','%'.$request->cari.'%')->get();
        }
        else
        {
            $kelurahan = DB::table('kelurahan')->paginate(8);
        }   
        return view('wilayah/kelurahan', compact('kelurahan'));
    }
    public function createkelurahan(Request $request)
    {
      $this->validate($request,
      [
          'id_kel' => 'required|min:5|unique:kecamatan',
          'nama_kel' => 'required',
      ],
      [
          'id_kel.required' => 'ID Kelurahan wajib di isi',
          'id_kel.min'      => 'ID Kelurahan minimal 5 karakter',
          'id_kel.unique' => 'ID Kelurahan  sudah digunakan',
          'nama_kel.required' => 'Nama Kelurahan wajib di isi',
          
      ]);
      // dd($request);
      $kelurahan = new Kelurahan();
      $kelurahan->id_kel = $request->id_kel;
      $kelurahan->nama_kel = $request->nama_kel;
      $kelurahan->save();
      return redirect('/kelurahan')->with('sukses','Data berita berhasil ditambahkan');
    }
    public function delete($id_kel)
    {
      DB::table('kelurahan')->where('id_kel', $id_kel)->delete();
      return redirect('/kelurahan')->with('sukses','Data berhasil dihapus!');
  
    }
  }
