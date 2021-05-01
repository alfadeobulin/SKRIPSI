<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adminlist extends Model
{
    protected $table = 'admin';
    protected $fillable =['nama_admin','no_telp','email_admin','id_admin'];
}
