<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function index()
    {
        $totalData = $this->totalUmkm();
        $totalDataMember = $this->totalMember();
        $kecamatan = DB::table('kecamatan')->paginate(8);
        $kelurahan = DB::table('kelurahan')->paginate(8);
        $categories = $this->ChartKecamatan();
        return view('umkm.visualisasi', compact('kecamatan','kelurahan','totalDataMember','totalData','categories'));
    }

    public function ChartKecamatan()
    {
        $dataChart = DB::table('usaha')
            ->join('kecamatan', 'usaha.id_kec', 'kecamatan.id_kec')
            ->select(
                'kecamatan.nama_kec as name',
                DB::raw('COUNT(usaha.id_kec) as y')
            )
            ->groupBy('kecamatan.nama_kec')
            ->orderBy('kecamatan.id_kec')
            ->get();
        return $dataChart;
    }
    protected function totalUmkm()
    {
        # code...
        $totalData = DB::table('usaha')
            ->select(
                DB::raw('count(*) as total'),
                
            )
            ->get();
        return $totalData;
    }

    protected function totalMember()
    {
        # code...
        $totalDataMember = DB::table('member')
            ->select(
                DB::raw('count(*) as total'),
                
            )
            ->get();
        return $totalDataMember;
    }
    
}
