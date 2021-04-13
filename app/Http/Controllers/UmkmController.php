<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use App\Models\Member;


class UmkmController extends Controller
{
    public function index()
    {
        $member = Member::all();
        return view ('admin.daftar', ['member' => $member]);
    }
    public function createmember(Request $request)
    {
        Member::create($request->all()); 
        return redirect('/daftarmemberumkm')->with('sukses','Data berhasil ditambahkan');
    }
}   