<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    protected $table = 'kecamatan';
    protected $fillable = ['id_kec','nama_kec'];
    public $timestamps = false;

    public function umkm()
    {
        return $this->hasMany(UMKM::class);
    }
     
}
