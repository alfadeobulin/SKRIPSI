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
    $this->validate($request,
    [
        'id_berita' => 'required|min:4|unique:berita',
        'judul' => 'required',
        'isi' => 'required',
        'penulis' => 'required',
        'tgl_terbit' => 'required',
        'link' => 'required',
        'id_admin' => 'required|min:3|max:3',
    ],
    [
        'id_berita.required' => 'ID berita wajib di isi',
        'id_berita.min'      => 'ID berita minimal 3 karakter',
        'id_berita.unique' => 'ID berita  sudah digunakan',
        'id_admin.max' => 'ID admin maksimal 3 digit',
        'id_admin.required' => 'ID admin wajib di isi',
        'id_admin.min'      => 'ID admin minimal 3 karakter',
        'isi.required'   => 'Konten berita wajib di isi',
        'tgl_terbit.required'   => 'Tanggal terbit berita wajib di isi',
        'penulis.required' => 'Penulis wajib di isi',
        'link.required' => 'Link wajib di isi',
        'judul.required' => 'Judul wajib di isi',
    ]);
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
  public function delete($id_berita)
  {
    DB::table('berita')->where('id_berita', $id_berita)->delete();
    return redirect('/berita')->with('sukses','Data berhasil dihapus!');
  }
  // public function LihatBerita(Request $request)
  // {
  //   if($request->has('cari'))
  //     {
  //         $berita = \App\Models\Berita::where('JUDUL','LIKE','%'.$request->cari.'%')->get();
  //     }
  //     else
  //     {
  //         $berita = Berita::all();
  //     }   
  //     return view ('detail/lihatberita', ['berita' => $berita]);
  // }
  public function IsiBerita($id_berita)
  {
      $berita = DB::table('berita')->where('id_berita', $id_berita)->first();
      //return $berita->judul;
      return view('guest/isiberita', ['berita'=>$berita]);
  }
}
