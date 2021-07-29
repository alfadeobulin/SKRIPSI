<?php

namespace App\Http\Controllers;

use App\Http\CocokanPasswordLama;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('auths/resetpassword');
    }

    public function store(Request $request)
    {
        if(!(Hash::check($request->get('passwordsekarang'),Auth::user()->password))){
            return back()->with('error','Password Lama Anda Tidak Cocok');
        }
        if(strcmp($request->get('passwordsekarang'), $request->get('passwordbaru'))==0){
            return back()->with('error','Password Baru Anda Tidak Boleh Sama Dengan Password Lama');
        }
        $request->validate([
            'passwordsekarang' => ['required', new CocokanPasswordLama],
            'passwordbaru' => ['required','min:6'],
            'konfirmasipassword' => ['same:passwordbaru'],
        ]);
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->passwordbaru)]);
        return back()->with('message','Berhasil Ganti Password');
    }

}
