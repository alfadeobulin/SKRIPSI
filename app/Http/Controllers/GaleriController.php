<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GaleriController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('cari'))
      {
          $galeri = \App\Models\Berita::where('JUDUL','LIKE','%'.$request->cari.'%')->get();
      }
      else
      {
          $galeri = Galeri::all();
      }   
      return view ('umkm/galeri', ['galeri' => $galeri]);
    }

    public function creategaleri(Request $request)
    {
        // dd($request);
        $galeri = new Galeri;
        $galeri->id_galeri = $request->id_galeri;
        $galeri->nama_gal = $request->nama_gal;
        $galeri->foto = $request->foto;
        $galeri->id_usaha = $request->id_usaha;
        $galeri->ktrgn_foto = $request->ktrgn_foto;        
        $galeri->save();
        return redirect('/galeri')->with('sukses','Data berita berhasil ditambahkan');
    }
    public function delete($id_galeri)
    {
      DB::table('galeri')->where('id_galeri', $id_galeri)->delete();
      return redirect('/galeri')->with('sukses','Data berhasil dihapus!');
    }

    public function editgaleri($id_galeri)
    {
      $galeri = DB::table('galeri')->where('id_galeri', $id_galeri)->first();
      return view ('umkm/editgaleri')->with(['galeri' => $galeri]);
    }

    public function update(Request $request, $galeri)
    {

      DB::table('galeri')->where('id_galeri',$request->id_galeri)->update([
      'id_galeri' => $request->id_galeri,
      'nama_gal' => $request->nama_gal,
      'foto' => $request->foto,
      'id_usaha' => $request->id_usaha,
      'ktrgn_foto' => $request->ktrgn_foto,]);
      
      if($request->hasFile('galeri'))
      {
        
        // $member = new \stdClass();
        // $member->success = false;
        dd($request->all());
        $request->file('galeri')->move('images/', $request->file('galeri')->getClientOriginalName());
        $galeri->avatar = $request->file('galeri')->getClientOriginalName();
        $galeri->save();
      }
      
      return redirect('/galeri')->with('sukses','Data berhasil diubah!');
    }
}

