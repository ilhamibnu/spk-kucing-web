<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    use HasFactory;

    protected $table = 'tb_gejala';

    protected $fillable = [
        'name',
        'nilai',
    ];

    public function detailPenyakit()
    {
        return $this->hasMany(DetailPenyakit::class, 'id_gejala', 'id');
    }
}
