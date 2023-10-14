<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalPrakerin extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'jadwal_prakerin';

    protected $primaryKey = 'id';

    protected $fillable = ['id_kelas', 'id_periode'];

    public function kelas(){
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    public function periode(){
        return $this->belongsTo(PeriodePrakerin::class, 'id_periode');
    }
}
