<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Umkm extends Model
{
    use HasFactory;
    protected $table = 'usaha';
    //protected $fillable =['id_admin','nama_admin','email_admin','nohp_admin','password'];
    // public $timestamps = false; 
}
