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
        return  view ('auths.login');
    }
    public function postlogin(Request $request)
    {
        
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) 
        {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        else
        {
            return redirect ('/login')->with('alert','Email atau password salah, silahkan cek kembali!');
        }
        
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
