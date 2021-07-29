<?php

namespace App\Models;

use Illuminate\support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Umkm extends Model
{
    use HasFactory;
    protected $table = 'usaha';
    protected $fillable = ['id_usaha','nama_ush','alamat_ush','ket_ush','longitude','latitude','id_member','id_kel','id_kec'];
    public $timestamps = false; 

    public function allData()
    {
       $results = DB::table('usaha')->select('nama_ush', 'latitude', 'longitude', 'alamat_ush')->get();
        return $results;
    }

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }

    public function galeri()
    {
        return $this->hasMany(Galeri::class,'umkm_id');
    }

}
