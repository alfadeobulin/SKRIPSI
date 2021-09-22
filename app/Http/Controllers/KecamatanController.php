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
        'nama_kec' => 'required',
    ],
    [
        
        'nama_kec.required' => 'Nama Kecamatan wajib di isi',
        
    ]);
    $get_id =  DB::select('select max(id_kec) as max_code from kecamatan');
      if ($get_id[0]->max_code == null) {
        $urutan = 1;
        $id_kec = "KEC" . sprintf("%00s", $urutan);
      }else{
        $urutan = (int) substr($get_id[0]->max_code,1,4);
        $urutan++;
        $id_kec = "KEC" . sprintf("%02s", $urutan);
      }

    // dd($request);
    $kecamatan = new Kecamatan();
    $kecamatan->id_kec = $id_kec;
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

