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
        'nama',
        'deskripsi',
        'solusi',
    ];

    public function getDescriptionForEvent(string $eventName): string
    {
        return "You have {$eventName} penyakit";
    }

    public function detailPenyakit()
    {
        return $this->hasMany(DetailPenyakit::class, 'penyakit_id', 'id');
    }

    public function gejala()
    {
        return $this->belongsToMany(Gejala::class)->withPivot('value_cf');
    }

    public function riwayat()
    {
        return $this->hasMany(Riwayat::class, 'penyakit_id', 'id');
    }
}
