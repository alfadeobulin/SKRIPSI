<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Member extends Model
{
    use HasFactory;
    protected $table = 'member';
    protected $fillable = ['id_member','nama_member','nohp_member','alamat_member','avatar','id_admin'];
    public $timestamps = false; 

   

    public function getAvatar()
    {
        if (!$this->avatar) 
        {
            return asset('images/user.jpg');
        }
        return asset('images/'.$this->avatar);
    }

    
}

