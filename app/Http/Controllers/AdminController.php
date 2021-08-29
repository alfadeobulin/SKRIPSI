<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use App\Models\User;
use Hash;

class AdminController extends Controller
{
  public function index(Request $request)
  {
      if($request->has('cari'))
      {
          $user = \App\Models\User::where('name','LIKE','%'.$request->cari.'%')->get();
      }
      else
      {
          $user = User::all();
      }   
      return view ('admin/daftaradmin', ['user' => $user]);
  }
  public function createadmin(Request $request)
  {
    $this->validate($request,
    [
        'name' => 'required',
        'email' => 'required|email|unique:user',
    ],
    [
        'nama_admin.required'   => 'Nama wajib di isi',
        'email.required' => 'Email wajib di isi',
        'email.email' => 'Format Email Salah',
        'email.unique' => 'Email Sudah Digunakan',
        
    ]);

    $get_id =  DB::select('select max(id_users) as max_code from user');
    if ($get_id[0]->max_code == null) {
      $urutan = 1;
      $id_users = "A" . sprintf("%04s", $urutan);
    }else{
      $urutan = (int) substr($get_id[0]->max_code,1,4);
      $urutan++;
      $id_users = "A" . sprintf("%04s", $urutan);
    }

    //$user= User::all()->toArray();
    $user = new \App\Models\User;
    $user->id_users = $id_users; 
    $user->role = 'admin';
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = bcrypt('admin123');
    $user->save();

    return redirect('/daftaradmin')->with('sukses','Data berita berhasil ditambahkan');
  }
  
  public function delete($id_users)
  {
      DB::table('user')->where('id_users', $id_users)->delete();
      return redirect('/daftaradmin')->with('sukses','Data berhasil dihapus!');
  }

  public function profile($id_users)
    {
      $user = DB::table('user')->where('id_users', $id_users)->first();
      return view('admin/profileadmin', ['user'=>$user]);
    }
}
