<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;
    protected $fillable = [
        'lattitude',
        'longtitude', 'namalokasi', 'kategori', 'rt', 'rw', 'kelurahan', 'kecamatan',
        'pic1', 'pic2', 'telp1', 'pic2', 'telp1', 'telp2', 'namasurveyor', 'tanggal'
    ];

    public function foto()
    {
        return $this->hasMany(Foto::class);
    }

    public function fotoFirst()
    {
        return $this->hasOne(Foto::class);
    }
}
