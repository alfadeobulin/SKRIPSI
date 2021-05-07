<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    public function login()
    {
        return  view ('auths.login');
    }
    public function postlogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        return redirect ('/login');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
