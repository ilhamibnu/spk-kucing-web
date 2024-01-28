<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    use HasFactory;

    protected $table = 'tb_penyakit';

    protected $fillable = [
        'name',
        'deskripsi',
        'solusi',
    ];

    public function detailPenyakit()
    {
        return $this->hasMany(DetailPenyakit::class, 'id_penyakit', 'id');
    }
}
