<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenyakit extends Model
{
    use HasFactory;

    protected $table = 'tb_detail_penyakit';

    protected $fillable = [
        'id_penyakit',
        'id_gejala',
    ];

    public function penyakit()
    {
        return $this->belongsTo(Penyakit::class, 'id_penyakit', 'id');
    }

    public function gejala()
    {
        return $this->belongsTo(Gejala::class, 'id_gejala', 'id');
    }
}
