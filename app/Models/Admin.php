<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'member';
    protected $fillable = ['no_ktp','nama','no_telp','alamat','id_admin'];
}
