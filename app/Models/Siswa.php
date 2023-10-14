<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    protected $table = 'siswa';

    protected $primaryKey = 'id';

    protected $fillable = ['nama', 'nis', 'nisn', 'jenis_kelamin', 'telepon', 'telepon_ortu', 'email', 'alamat', 'id_kelas'];

    public function kelas(){
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }
}
