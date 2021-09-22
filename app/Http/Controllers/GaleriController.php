<?php

namespace App\Http\Controllers;
use App\Models\Umkm;
use App\Models\User;
use App\Models\Member;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class GaleriController extends Controller
{
    public function index(Request $request)
    {
      $usaha    = \App\Models\Umkm::all();
        if($request->has('cari'))
      {
          $galeri = \App\Models\Galeri::where('ktrgn_foto','LIKE','%'.$request->cari.'%')->get();
      }
      else
      {
        // $galeri = Galeri::all();
        $galeri = DB::table('galeri')
        ->join('usaha', 'usaha.id_usaha', '=', 'galeri.id_usaha')
        ->select('galeri.*', 'usaha.nama_ush')
        ->get();
      }   
      return view ('umkm/galeri', ['galeri' => $galeri, 'usaha' => $usaha]);
    }

    public function galeriku()
    {
        $user = Auth::user();
        $galeri = DB::table('galeri')
        ->join('usaha', 'usaha.id_usaha', '=', 'galeri.id_usaha')
        ->select('galeri.*', 'usaha.nama_ush')
        ->where('usaha.id_users','=',$user->id_users)
        ->get();
        return view('umkm/galeriku',compact('galeri'));
    }

    public function creategaleri(Request $request)
    {
      $this->validate($request,
      [
          'nama_gal' => 'required',
          'foto' => 'required',
          'id_usaha' => 'required|min:3|max:10',
          'ktrgn_foto' => 'required',
      ],
      [
          'nama_galeri.required'   => 'Nama wajib di isi',
          'foto.required' => 'Foto wajib di unggah',
          'id_usaha.required' => 'ID usaha wajib di isi',
          'id_usaha.min'      => 'ID usaha minimal 3 karakter',
          'ktrgn_foto.required' => 'Keterangan foto wajib di isi',
      ]);
      
      $get_id =  DB::select('select max(id_galeri) as max_code from galeri');
      if ($get_id[0]->max_code == null) {
        $urutan = 1;
        $id_galeri = "G" . sprintf("%04s", $urutan);
      }else{
        $urutan = (int) substr($get_id[0]->max_code,1,4);
        $urutan++;
        $id_galeri = "G" . sprintf("%04s", $urutan);
      }


      $upload = "N";
      if ($request->hasFile('foto')) 
      {
          $destination = "images/galeri";
          $foto = $request->file('foto');
          $foto->move($destination, $foto->getClientOriginalName());
          $upload = "Y";
      }

      if ($upload=="Y") {
        $galeri = new Galeri;
        $galeri->id_galeri = $id_galeri;
        $galeri->nama_gal = $request->nama_gal;
        $galeri->foto = $foto->getClientOriginalName();
        $galeri->id_usaha = $request->id_usaha;
        $galeri->ktrgn_foto = $request->ktrgn_foto;        
        $galeri->save();
    }

         //dd($request);
       
        return redirect('/galeriku')->with('sukses','Data berita berhasil ditambahkan');
    }
    public function delete($id_galeri)
    {
      DB::table('galeri')->where('id_galeri', $id_galeri)->delete();
      return redirect('/galeriku')->with('sukses','Data berhasil dihapus!');
    }

    public function editgaleri($id_galeri)
    {
      $galeri = DB::table('galeri')->where('id_galeri', $id_galeri)->first();
      return view ('umkm/editgaleri')->with(['galeri' => $galeri]);
    }

    public function update(Request $request,  Galeri $galeri)
    {
      // $ubah = Galeri::findorfail($id_galeri)->where('id_galeri', $id_galeri)->first();
      // $awal = $ubah->foto;

      // $galeri = ([
      //   'id_galeri' => $request->id_galeri,
      //   'nama_gal' => $request->nama_gal,
      //   'foto' => $awal->foto,
      //   'id_usaha' => $request->id_usaha,
      //   'ktrgn_foto' => $request->ktrgn_foto,]);

      // $request->foto->move(public_path().'images/galeri', $awal);
      // $ubah->update($galeri);


      DB::table('galeri')->where('id_galeri',$request->id_galeri)->update([
      'id_galeri' => $request->id_galeri,
      'nama_gal' => $request->nama_gal,
      'foto' => $request->foto,
      'id_usaha' => $request->id_usaha,
      'ktrgn_foto' => $request->ktrgn_foto,]);
      
      if($request->hasFile('foto'))
      {
       $galeri->update($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('images/galeri',$request->file('foto')->getClientOriginalName());
            $galeri->foto = $request->file('foto')->getClientOriginalName();
            $galeri->save();
        }
      }
      return redirect('/galeri')->with('sukses','Data berhasil diubah!');
      
    }

    public function LihatGaleri(Request $request)
    {
      if($request->has('cari'))
      {
          $galeri = \App\Models\Berita::where('JUDUL','LIKE','%'.$request->cari.'%')->get();
      }
      else
      {
        $galeri = DB::table('usaha')
        ->join('galeri', 'usaha.id_usaha', '=', 'galeri.id_usaha')
        ->select('galeri.*', 'usaha.nama_ush')
        ->get();
      }   
      return view ('detail/lihatgaleri', ['galeri' => $galeri]);
    }
}

