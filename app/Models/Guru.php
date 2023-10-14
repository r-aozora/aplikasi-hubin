<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'guru';

    protected $primaryKey = 'id';

    protected $fillable = ['nama', 'nip', 'sebagai', 'telepon'];

    public function user(){
        return $this->hasOne(User::class, 'id_guru');
    }

    public function kelas(){
        return $this->hasOne(Kelas::class, 'id_guru');
    }
}
