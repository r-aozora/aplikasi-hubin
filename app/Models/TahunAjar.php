<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunAjar extends Model
{
    use HasFactory;

    protected $table = 'tahun_ajar';

    protected $fillable = ['id', 'kode', 'nama'];

    public function kelas(){
        return $this->hasMany(Kelas::class, 'id_ta');
    }
}
