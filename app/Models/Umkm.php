<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Umkm extends Model
{
    use HasFactory;
    protected $table = 'usaha';
    protected $fillable =['id_usaha','nama_ush','alamat_ush','ket_ush','longitude','latitude','id_member','id_admin','id_kel','id_kec'];
    public $timestamps = false; 
}
