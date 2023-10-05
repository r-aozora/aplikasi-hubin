<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';

    protected $fillable = ['id', 'kode', 'nama', 'id_ta', 'id_guru', 'id_program', 'id_periode'];

    public function tahun_ajar(){
        return $this->belongsTo(TahunAjar::class, 'id_ta');
    }

    public function guru(){
        return $this->belongsTo(Guru::class, 'id_guru');
    }

    public function program(){
        return $this->belongsTo(ProgramKeahlian::class, 'id_program');
    }

    public function periode(){
        return $this->belongsTo(PeriodePrakerin::class, 'id_periode');
    }

    public function siswa(){
        return $this->hasMany(Siswa::class, 'id_kelas');
    }
}
