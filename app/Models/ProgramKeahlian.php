<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramKeahlian extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'kode', 'nama'];

    public function kelas(){
        return $this->hasMany(Kelas::class, 'id_program');
    }
}
