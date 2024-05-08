<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailRiwayatGejala extends Model
{
    use HasFactory;

    protected $table = 'tb_detail_riwayat_gejala';

    protected $fillable = [
        'id_riwayat',
        'id_gejala',
    ];

    public function riwayat()
    {
        return $this->belongsTo(Riwayat::class, 'id_riwayat', 'id');
    }

    public function gejala()
    {
        return $this->belongsTo(Gejala::class, 'id_gejala', 'id');
    }
}
