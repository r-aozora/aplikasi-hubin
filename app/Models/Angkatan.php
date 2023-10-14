<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Angkatan extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'angkatan';

    protected $primaryKey = 'id';

    protected $fillable = ['kode', 'nama'];

    public function kelas(){
        return $this->hasMany(Kelas::class, 'id_angkatan');
    }
}
