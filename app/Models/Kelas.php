<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'kelas';

    protected $primaryKey = 'id';

    protected $fillable = ['slug', 'nama', 'id_guru', 'id_program', 'id_angkatan'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function angkatan(){
        return $this->belongsTo(Angkatan::class, 'id_angkatan');
    }

    public function guru(){
        return $this->belongsTo(Guru::class, 'id_guru');
    }

    public function program(){
        return $this->belongsTo(Program::class, 'id_program');
    }

    public function siswa(){
        return $this->hasMany(Siswa::class, 'id_kelas');
    }

    public function jadwal(){
        return $this->hasOne(JadwalPrakerin::class, 'id_kelas');
    }
}
