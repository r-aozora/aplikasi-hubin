<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'guru';

    protected $fillable = ['id', 'nama', 'nip', 'sebagai', 'telepon'];

    public function user(){
        return $this->hasOne(User::class, 'id_guru');
    }

    public function kelas(){
        return $this->hasOne(Kelas::class, 'id_guru');
    }
}
