<?php

namespace App\Http\Controllers;
use App\Models\Berita;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        return view('umkm/home');
    }
}
