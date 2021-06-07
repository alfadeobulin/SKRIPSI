<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    use HasFactory;
    protected $table = 'kelurahan';
    protected $fillable = ['id_kel','nama_kel'];
    public $timestamps = false;
}
