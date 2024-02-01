<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    use HasFactory;

    protected $table = 'tb_penyakit';

    protected $fillable = [
        'kode',
        'name',
        'deskripsi',
        'solusi',
    ];

    public function detailPenyakit()
    {
        return $this->hasMany(DetailPenyakit::class, 'penyakit_id', 'id');
    }

    public function gejala()
    {
        return $this->belongsToMany(Gejala::class)->withPivot('value_cf');
    }
}
