<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;
    protected $table = 'galeri';
    protected $fillable = ['id_galeri','nama_gal','foto','id_usaha','ktrgn_foto'];
    public $timestamps = false;

     
    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function umkm()
    {
        return $this->belongsTo(Umkm::class);
    }
}
