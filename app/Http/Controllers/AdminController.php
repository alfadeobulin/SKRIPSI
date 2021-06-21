<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use App\Models\Admin;
use Hash;

class AdminController extends Controller
{
  public function index(Request $request)
  {
      if($request->has('cari'))
      {
          $admin = \App\Models\Admin::where('nama_admin','LIKE','%'.$request->cari.'%')->get();
      }
      else
      {
          $admin = Admin::all();
      }   
      return view ('admin/daftaradmin', ['admin' => $admin]);
  }
  public function createadmin(Request $request)
  {
    $this->validate($request,
    [
        'id_admin' => 'required|min:3|max:3|unique:member',
        'nama_admin' => 'required',
        'email' => 'required|email|unique:users',
        'nohp_admin' => 'required|max:12',
    ],
    [
        'id_admin.required' => 'ID admin wajib di isi',
        'id_admin.min'      => 'ID admin minimal 3 karakter',
        'id_admin.max' => 'ID admin maksimal 3 digit',
        'nama_admin.required'   => 'Nama wajib di isi',
        'nohp_admin.required' => 'No HP wajib di isi',
        'nohp_admin.max' => 'No HP melebihi 12 digit',
        'email.required' => 'Email wajib di isi',
        'email.email' => 'Format Email Salah',
        'email.unique' => 'Email Sudah Digunakan',
        
    ]);
    //$user= User::all()->toArray();
    $user = new \App\Models\User;
    $user->role = 'admin';
    $user->name = $request->nama_admin;
    $user->email = $request->email;
    $user->password = bcrypt('admin123');
    $user->save();

    $admin = new Admin;
    $admin->id_admin = $request->id_admin;
    $admin->nama_admin = $request->nama_admin;
    $admin->nohp_admin = $request->nohp_admin;
    $admin->save();

    return redirect('/daftaradmin')->with('sukses','Data berita berhasil ditambahkan');
  }
  
  public function delete($id_admin)
  {
      DB::table('admin')->where('id_admin', $id_admin)->delete();
      return redirect('/daftaradmin')->with('sukses','Data berhasil dihapus!');
  }
}
