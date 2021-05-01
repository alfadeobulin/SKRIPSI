<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use App\Models\Member;

class MemberController extends Controller
{
    
    public function editmember($id)
    {
        // $member = \App\Models\Member::find($id);
        // return view ('admin.editmember')->with(['member' => $member]);;
    }
    public function update(Request $request, $id)
    {
        // $member = \App\Models\Member::find($id);
        // $member->update($request->all());
        // return redirect('/daftarmemberumkm')->with('sukses','Data berhasil diubah!');
    }
}
