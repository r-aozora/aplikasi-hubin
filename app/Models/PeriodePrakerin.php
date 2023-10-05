<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriodePrakerin extends Model
{
    use HasFactory;

    protected $table = 'periode_prakerin';

    protected $fillable = ['id', 'kode', 'awal', 'akhir'];

    public function kelas(){
        return $this->hasMany(Kelas::class, 'id_periode');
    }
}
