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
      $berita = Berita::all();
      return view ('admin/createberita', ['berita' => $berita]);
  }

  public function store(Request $request)
  {
    $this->validate($request,
    [
        'judul' => 'required',
        'isi' => 'required',
        'penulis' => 'required',
        'tgl_terbit' => 'required',
        'link' => 'required',
    ],
    [
        'isi.required'   => 'Konten berita wajib di isi',
        'tgl_terbit.required'   => 'Tanggal terbit berita wajib di isi',
        'penulis.required' => 'Penulis wajib di isi',
        'link.required' => 'Link wajib di isi',
        'judul.required' => 'Judul wajib di isi',
        
    ]);
    $get_id =  DB::select('select max(id_berita) as max_code from berita');
      if ($get_id[0]->max_code == null) {
        $urutan = 1;
        $id_berita = "B" . sprintf("%04s", $urutan);
      }else{
        $urutan = (int) substr($get_id[0]->max_code,1,4);
        $urutan++;
        $id_berita = "B" . sprintf("%04s", $urutan);
      }

    //dd($request);
    $berita = new Berita;
    $berita->id_berita = $id_berita;
    $berita->judul = $request->judul;
    $berita->isi = $request->isi;
    $berita->penulis = $request->penulis;
    $berita->tgl_terbit = $request->tgl_terbit;
    $berita->link = $request->link;
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
