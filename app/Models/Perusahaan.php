<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'perusahaan';

    protected $primaryKey = 'id';

    protected $fillable = ['slug', 'nama', 'alamat', 'penerima', 'kecamatan', 'kota', 'provinsi', 'lokasi', 'telepon', 'koordinat'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
