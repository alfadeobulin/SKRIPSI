<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use App\Models\Berita;

class BeritaController extends Controller
{
    public function index(Request $request)
  {
      if($request->has('cari'))
      {
          $berita = \App\Models\Berita::where('JUDUL','LIKE','%'.$request->cari.'%')->get();
      }
      else
      {
          $berita = Berita::all();
      }   
      return view ('umkm/berita', ['berita' => $berita]);
  }
  public function createberita(Request $request)
  {
    // dd($request);
    $berita = new Berita;
    $berita->id_berita = $request->id_berita;
    $berita->judul = $request->judul;
    $berita->isi = $request->isi;
    $berita->penulis = $request->penulis;
    $berita->tgl_terbit = $request->tgl_terbit;
    $berita->link = $request->link;
    $berita->id_admin = $request->id_admin;
    $berita->save();
    return redirect('/berita')->with('sukses','Data berita berhasil ditambahkan');
  }
  public function delete($id)
  {
    $berita = \App\Models\Berita::find($id);
    $berita->delete($berita);
    return redirect('/berita')->with('sukses','Data berita berhasil dihapus!');
  }
}
