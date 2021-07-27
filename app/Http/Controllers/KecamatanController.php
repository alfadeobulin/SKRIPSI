<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Kecamatan;

class KecamatanController extends Controller
{
    public function index(Request $request)
    {
       
      if($request->has('cari'))
      {
          $kecamatan = \App\Models\Kecamatan::where('nama_kec','LIKE','%'.$request->cari.'%')->get();
      }
        else
        {
            $kecamatan = DB::table('kecamatan')->paginate(8);
        }   
        return view('wilayah/kecamatan', compact('kecamatan'));
    }

    public function createkecamatan(Request $request)
  {
    $this->validate($request,
    [
        'id_kec' => 'required|min:5|unique:kecamatan',
        'nama_kec' => 'required',
    ],
    [
        'id_kec.required' => 'ID Kecamatan wajib di isi',
        'id_kec.min'      => 'ID Kecamatan minimal 5 karakter',
        'id_kec.unique' => 'ID Kecamatan  sudah digunakan',
        'nama_kec.required' => 'Nama Kecamatan wajib di isi',
        
    ]);
    // dd($request);
    $kecamatan = new Kecamatan();
    $kecamatan->id_kec = $request->id_kec;
    $kecamatan->nama_kec = $request->nama_kec;
    $kecamatan->save();
    return redirect('/kecamatan')->with('sukses','Data berita berhasil ditambahkan');
  }
  public function delete($id_kec)
  {
    DB::table('kecamatan')->where('id_kec', $id_kec)->delete();
    return redirect('/kecamatan')->with('sukses','Data berhasil dihapus!');

  }
}

