<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use App\Models\Umkm;
use PDF;
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

  public function create()
  {
      return view ('member/createusaha');
  }

  public function store(Request $request)
    {
      $this->validate($request,
      [
          'id_usaha' => 'required|min:3|max:10|unique:usaha',
          'nama_ush' => 'required|unique:usaha',
          'alamat_ush' => 'required',
          'ket_ush' => 'required|max:200',
          'longitude' => 'required',
          'latitude' => 'required',
          'id_member' => 'required|min:3|max:10|unique:member',
          'id_kel' => 'required|min:4|max:10',
          'id_kec' => 'required|min:4|max:10',
      ],
      [
          'id_usaha.required' => 'ID usaha wajib di isi',
          'id_usaha.min'      => 'ID usaha minimal 3 karakter',
          'id_usaha.max' => 'ID usaha maksimal 10 digit',
          'id_usaha.unique' => 'ID usaha sudah digunakan',
          'nama_ush.required'   => 'Nama usaha wajib di isi',
          'nama_ush.unique' => 'Nama usaha sudah digunakan',
          'alamat_ush.required' => 'Alamat Wajib Diisi',
          'ket_ush.required' => 'Keterangan tidak boleh kosong',
          'ket_ush.max' => 'keterangan maksimal 200 karakter',
          'longitude.required' => 'longitude tidak boleh kosong',
          'latitude.required' => 'latitude tidak boleh kosong',
          'id_member.required' => 'ID member wajib di isi',
          'id_member.min'      => 'ID member minimal 3 karakter',
          'id_member.max' => 'ID member maksimal 3 digit',
          'id_member.unique' => 'ID member Sudah Digunakan',
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

  public function LihatUmkm(Request $request)
  {
    if($request->has('cari'))
      {
          $usaha = \App\Models\Umkm::where('nama_ush','LIKE','%'.$request->cari.'%')->get();
      }
      else
      {
          $usaha = Umkm::all();
      }   
      return view ('detail/lihatumkm', ['usaha' => $usaha]);
  }

  public function editusaha($id_usaha)
    {
      $usaha = DB::table('usaha')->where('id_usaha', $id_usaha)->first();
      return view ('umkm/editusaha')->with(['usaha' => $usaha]);
    }

  public function update(Request $request)
    {

      DB::table('usaha')->where('id_usaha',$request->id_usaha)->update([
        'id_usaha' => $request->id_usaha,
        'nama_ush' => $request->nama_ush,
        'alamat_ush' => $request->alamat_ush,
        'ket_ush' => $request->ket_ush,
        'longitude' => $request->longitude,
        'latitude' => $request->latitude,
        'id_member' => $request->id_member,
        'id_kel' => $request->id_kel,
        'id_kec' => $request->id_kec,
    ]);
      
      return redirect('/umkm')->with('sukses','Data berhasil diubah!');
    }

  public function __construct()
  {
    
    $this->Umkm = new Umkm();
  }

  public function LihatMaps()
  {
    $results=$this->Umkm->allData();
    return view ('detail/lihatmaps',['results' => $results]);
  }
  public function sebaran()
  {
    $results=$this->Umkm->allData();
    return view ('wilayah/sebaranumkm',['results' => $results]);
  }

  public function exportPdf() 
  {
      $usaha = Umkm::all();
      view()->share('umkm', $usaha);
      $pdf = PDF::loadview('download/umkmpdf');
      return $pdf->download('umkm.pdf');
      
  }
  
}   