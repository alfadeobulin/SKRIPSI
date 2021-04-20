<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use App\Models\Member;

class MemberController extends Controller
{
  public function index(Request $request)
  {
      if($request->has('cari'))
      {
          $member = \App\Models\Member::where('nama','LIKE','%'.$request->cari.'%')->get();
      }
      else
      {
          $member = Member::all();
      }   
      return view ('admin.daftar', ['member' => $member]);
  }
  public function createmember(Request $request)
  {
      Member::create($request->all()); 
      return redirect('/daftarmemberumkm')->with('sukses','Data berhasil ditambahkan');
  }
  public function editmember($id)
  {
      $member = \App\Models\Member::find($id);
      return view ('admin.editmember')->with(['member' => $member]);;
  }
  public function update(Request $request, $id)
  {
      $member = \App\Models\Member::find($id);
      $member->update($request->all());
      return redirect('/daftarmemberumkm')->with('sukses','Data berhasil diubah!');
  }
  public function delete($id)
  {
      $member = \App\Models\Member::find($id);
      $member->delete($member);
      return redirect('/daftarmemberumkm')->with('sukses','Data berhasil dihapus!');
  }
}
