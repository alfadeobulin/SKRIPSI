<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use App\Models\Umkm;
use App\Models\Member;
use App\Models\Kelurahan;
use App\Models\Kecamatan;
use App\Models\Galeri;
use App\Exports\UmkmExport;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use Illuminate\Support\Facades\Auth;


class UmkmController extends Controller
{

   public function index(Request $request)
  {
      $member    = \App\Models\Member::all();
      $kecamatan    = \App\Models\Kecamatan::all();
      $kelurahan    = \App\Models\Kelurahan::all();
      // $user =  \App\Models\User::all();
      
      if($request->has('cari'))
      {
          $usaha = \App\Models\Umkm::where('nama_ush','LIKE','%'.$request->cari.'%')->get();
      }
      else
      {
        $user = Auth::user();
          $usaha = DB::table('usaha')
          ->join('kecamatan', 'usaha.id_kec', '=', 'kecamatan.id_kec')
          ->join('kelurahan', 'usaha.id_kel', '=', 'kelurahan.id_kel')
          ->join('member', 'usaha.id_users', '=', 'member.id_users')
          ->select('usaha.*', 'kecamatan.nama_kec', 'kelurahan.nama_kel', 'member.nama_member')
          ->where('usaha.id_users','=',$user->id_users)
          ->get();
          //$usaha = Umkm::all();
      }   
      return view ('umkm/usaha', ['usaha' => $usaha, 'member' => $member, 'kecamatan' => $kecamatan,'kelurahan' => $kelurahan]);
  }

  public function UsahaAll()
  {
    $member    = \App\Models\Member::all();
    $kecamatan    = \App\Models\Kecamatan::all();
    $kelurahan    = \App\Models\Kelurahan::all();

      $usaha = Umkm::all();
      $usaha = DB::table('usaha')
      ->join('kecamatan', 'usaha.id_kec', '=', 'kecamatan.id_kec')
      ->join('kelurahan', 'usaha.id_kel', '=', 'kelurahan.id_kel')
      ->join('member', 'usaha.id_users', '=', 'member.id_users')
      ->select('usaha.*', 'kecamatan.nama_kec', 'kelurahan.nama_kel', 'member.nama_member')
      ->get();
    return view ('umkm/usahaall', ['usaha' => $usaha,'member' => $member, 'kecamatan' => $kecamatan,'kelurahan' => $kelurahan]);
  }

  public function create(Request $request)
  {
      $kecamatan = Kecamatan::all();
      $kelurahan = Kelurahan::all();
      return view ('member/createusaha', ['kecamatan' => $kecamatan,'kelurahan' => $kelurahan]);
  }

  public function store(Request $request)
    {
      $this->validate($request,
      [
          'nama_ush' => 'required|unique:usaha|max:200',
          'alamat_ush' => 'required',
          'ket_ush' => 'required|max:200',
          'longitude' => 'required',
          'latitude' => 'required',
      ],
      [
          'nama_ush.required'   => 'Nama usaha wajib di isi',
          'nama_ush.max'   => 'Nama maksimal 200 karakter',
          'nama_ush.unique' => 'Nama usaha sudah digunakan',
          'alamat_ush.required' => 'Alamat Wajib Diisi',
          'ket_ush.required' => 'Keterangan tidak boleh kosong',
          'ket_ush.max' => 'keterangan maksimal 200 karakter',
          'longitude.required' => 'longitude tidak boleh kosong',
          'latitude.required' => 'latitude tidak boleh kosong',
      ]);
      
      $get_id =  DB::select('select max(id_usaha) as max_code from usaha');
      if ($get_id[0]->max_code == null) {
        $urutan = 1;
        $id_usaha = "U" . sprintf("%04s", $urutan);
      }else{
        $urutan = (int) substr($get_id[0]->max_code,1,4);
        $urutan++;
        $id_usaha = "U" . sprintf("%04s", $urutan);
      }

      $upload = "N";
      if ($request->hasFile('avatar_usaha')) 
      {
          $destination = "images/usaha";
          $avatar_usaha = $request->file('avatar_usaha');
          $avatar_usaha->move($destination, $avatar_usaha->getClientOriginalName());
          $upload = "Y";
      }

      $user = Auth::user();
      if ($upload=="Y") {
      //dd($request->all());
      $usaha = new Umkm;
      $usaha->id_usaha = $id_usaha;
      $usaha->nama_ush = $request->nama_ush;
      $usaha->avatar_usaha = $avatar_usaha->getClientOriginalName();
      $usaha->alamat_ush = $request->alamat_ush;
      $usaha->ket_ush = $request->ket_ush;
      $usaha->longitude = $request->longitude;
      $usaha->latitude = $request->latitude;
      $usaha->id_users = $user->id_users;
      $usaha->id_kel = $request->id_kel;
      $usaha->id_kec = $request->id_kec;
      $usaha->save();
      }
      return redirect('/umkm')->with('sukses','Data Usaha berhasil ditambahkan');
    }

  public function delete($id_usaha)
  {
    DB::table('usaha')->where('id_usaha', $id_usaha)->delete();
    return redirect('/umkm')->with('sukses','Data berhasil dihapus!');
  }

  public function LihatUmkm(Request $request)
  {
    $member    = \App\Models\Member::all();
    if($request->has('cari'))
      {
          $usaha = \App\Models\Umkm::where('nama_ush','LIKE','%'.$request->cari.'%')->get();
      }
      else
      {
        //dd($request);
        // $usaha = Umkm::all();
        $usaha = DB::table('usaha')
        ->join('member','usaha.id_users' , '=','member.id_users' )
        ->select('usaha.*', 'member.nohp_member')
        ->get();
      }   
      return view ('detail/lihatumkm', ['usaha' => $usaha],['member' => $member] );
  }

  public function LihatUmkmGaleri(Request $request, $id_usaha)
  {
    if($request->has('cari'))
      {
          $galeri = \App\Models\Galeri::where('nama_ush','LIKE','%'.$request->cari.'%')->get();
      }
      else
      {
          $galeri = Galeri::where('id_usaha','=',$id_usaha)->get();
      }
         
      return view ('detail/lihatgaleriumkm', ['galeri' =>$galeri]);
  }

  public function editusaha($id_usaha)
    {
      $kecamatan = Kecamatan::all();
      $kelurahan = Kelurahan::all();
      $member = Member::all();
      $usaha = DB::table('usaha')->where('id_usaha', $id_usaha)->first();
      return view ('umkm/editusaha', ['kecamatan' => $kecamatan,'kelurahan' => $kelurahan,'member' => $member])->with(['usaha' => $usaha]);
    }

  public function update(Request $request, $avatar_usaha)
    {
      $avatar_usaha='';
      if($request->hasFile('avatar_usaha'))
      {
        $file = $request->file('avatar_usaha');
        $filename = $file->getClientOriginalName();
        $file->move('images/usaha/', $filename);
        $avatar_usaha = $filename;
      }

      DB::table('usaha')->where('id_usaha',$request->id_usaha)->update([
        'nama_ush' => $request->nama_ush,
        'avatar_usaha' => $avatar_usaha,
        'alamat_ush' => $request->alamat_ush,
        'ket_ush' => $request->ket_ush,
        'longitude' => $request->longitude,
        'latitude' => $request->latitude,
        'id_kel' => $request->id_kel,
        'id_kec' => $request->id_kec,
    ]);
      
      return redirect('/umkm')->with('sukses','Data berhasil diubah!');
    }

  public function __construct()
  {
    
    $this->Umkm = new Umkm();
  }

  public function LihatMaps(Request $request)
  {
    $results = \App\Models\Umkm::all();
    $usaha = \App\Models\Umkm::all();
    if($request->has('cari'))
    {
      $usaha =  $results=$this->Umkm::where('nama_ush','LIKE','%'.$request->cari.'%')->get();   
    }
    else
    {
      $results=$this->Umkm->allData();
      
    }
   
    return view ('detail/lihatmaps',['usaha' => $usaha,'results' => $results]);
  }
  public function sebaran()
  {
    $results=$this->Umkm->allData();
    return view ('wilayah/sebaranumkm',['results' => $results]);
  }

  public function exportExcel() 
  {
      ob_end_clean(); 
      ob_start();
      return Excel::download(new UmkmExport, 'Umkm.xlsx');
  }

  public function exportPdf() 
  {
    $usaha = DB::table('usaha')
    ->join('member', 'usaha.id_users', '=', 'member.id_users')
    ->select('usaha.*', 'member.nama_member')
    ->get();
      view()->share('umkm', $usaha);
      $pdf = PDF::loadview('download/umkmpdf');
      return $pdf->download('umkm.pdf');
      
  }

  
  
}   