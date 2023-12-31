<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = [];

    protected $table = 'users';

    protected $primaryKey = 'id';

    protected $fillable = ['email', 'username', 'password', 'level', 'id_guru'];

    public function guru(){
        return $this->belongsTo(Guru::class, 'id_guru');
    }
}
