<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use App\Models\Umkm;
use Illuminate\Support\Facades\Auth;

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

  public function create(Request $request)
    {
      $this->validate($request,
      [
          'id_usaha' => 'required|min:4|max:10|unique:usaha',
          'nama_usaha' => 'required',
          'alamat_ush' => 'required',
          'ket_ush' => 'required',
          'longitude' => 'required',
          'latitude' => 'required',
          'id_member' => 'required|min:4|max:10|unique:member',
          'id_usaha' => 'required|min:3|max:10',
          'id_kel' => 'required|min:4|max:10|unique:kelurahan',
          'id_kec' => 'required|min:4|max:10|unique:kecamatan',
          'ktrgn_foto' => 'required',
      ],
      [
          'id_galeri.required' => 'ID galeri wajib di isi',
          'id_galeri.min'      => 'ID galeri minimal 3 karakter',
          'id_galeri.max' => 'ID galeri maksimal 3 digit',
          'id_galeri.unique' => 'ID galeri Sudah Digunakan',
          'nama_galeri.required'   => 'Nama wajib di isi',
          'foto.required' => 'Foto wajib di unggah',
          'id_usaha.required' => 'ID usaha wajib di isi',
          'id_usaha.min'      => 'ID usaha minimal 3 karakter',
          'id_usaha.max' => 'ID usaha maksimal 3 digit',
          'id_kel.required' => 'ID kelurahan wajib di isi',
          'id_kel.min'      => 'ID kelurahan minimal 3 karakter',
          'id_kel.max' => 'ID kelurahan maksimal 3 digit',
          'id_kec.required' => 'ID kecamatan wajib di isi',
          'id_kec.min'      => 'ID kecamatan minimal 3 karakter',
          'id_kec.max' => 'ID kecamatan maksimal 3 digit',
          
      ]);

      //dd($request->all());
      $usaha = new Umkm;
      $usaha->id_usaha = $request->id_usaha;
      $usaha->nama_ush = $request->nama_ush;
      $usaha->alamat_ush = $request->alamat_ush;
      $usaha->ket_ush = $request->ket_ush;
      $usaha->longitude = $request->longitude;
      $usaha->latitude = $request->latitude;
      $usaha->id_member = $request->id_member;
      $usaha->id_kel = $request->id_kel;
      $usaha->id_kec = $request->id_kec;
      $usaha->save();
      return redirect('/umkm')->with('sukses','Data berita berhasil ditambahkan');
    }

  public function delete($id_usaha)
  {
    DB::table('usaha')->where('id_usaha', $id_usaha)->delete();
    return redirect('/umkm')->with('sukses','Data berhasil dihapus!');
  }

  
}   