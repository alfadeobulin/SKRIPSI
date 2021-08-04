<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Member;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $member    = \App\Models\Member::all();
        
        if($request->has('cari'))
        {
            $usaha = \App\Models\Umkm::where('nama_ush','LIKE','%'.$request->cari.'%')->get();
        }
        else
        {
            $member = Member::all();
        }   
        return view ('umkm/usaha', ['usaha' => $usaha, 'member' => $member,]);
    }
    public function show($id)
    {
        $user = User::find($id);
        $profile = User::where('id', $id)->first();
        return view('auths/showprofile', compact(['user','profile']));
    }
}
