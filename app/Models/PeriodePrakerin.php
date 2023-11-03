<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriodePrakerin extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'periode_prakerin';

    protected $primaryKey = 'id';

    protected $fillable = ['nama', 'awal', 'akhir'];

    public function jadwal(){
        return $this->hasMany(JadwalPrakerin::class, 'id_periode');
    }
}
