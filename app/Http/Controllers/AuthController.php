<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\Adminlist;

use Session;
use Hash;


class AuthController extends Controller
{
    public function login()
    {
        if(Auth::check()){
            return redirect()->route('dashboard');
        }
        return  view ('auths.login');
    }
    public function postlogin(Request $request)
    {
        if(Auth::attempt($request->only('email','password')))
        //$credentials = $request->only('email', 'password');
        //if (Auth::attempt($credentials)) 
        {
            //$request->session()->regenerate();
            //return redirect()->intended('/dashboard');
            return redirect('/dashboard');
        }
        else
        {
            return redirect ('/login')->with('alert','Email atau password salah, silahkan cek kembali!');
        }
        
    }
    public function logout()
    {
        //$user= User::all()->toArray();
        Auth::logout();
        return redirect('/login');
    }
}
