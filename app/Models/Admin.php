<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $table = 'member';
    protected $fillable = ['id_member','nama_member','email_member','nohp_member','alamat_member','password','id_admin'];
    public $timestamps = false; 
}
