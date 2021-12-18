<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Member extends Model
{
    use HasFactory;
    protected $table = 'member';

    protected $fillable = ['id_users','no_ktp','nama_member','nohp_member','alamat_member','avatar',];
    public $timestamps = false; 

   
    public function umkm()
    {
        return $this->hasMany(Umkm::class);
    }

    public function galeri()
    {
        return $this->hasMany(Galeri::class);
    }

    public function getAvatar()
    {
        if (!$this->avatar) 
        {
            return asset('/images/galeri/user.jpg');
        }
        return asset('/images/galeri'.$this->avatar);
    }

    public function user()
    {
        return $this->hasOne(User::class,"id_users",'id_users');
    }

    
}

