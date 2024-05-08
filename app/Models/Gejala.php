<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    use HasFactory;

    protected $table = 'tb_gejala';

    protected $fillable = [
        'kode',
        'nama',
        'foto',
        'link_penjelasan'
    ];

    public function getDescriptionForEvent(string $eventName): string
    {
        return "You have {$eventName} gejala";
    }

    public function detailPenyakit()
    {
        return $this->hasMany(DetailPenyakit::class, 'gejala_id', 'id');
    }

    public function penyakit()
    {
        return $this->belongsToMany(Penyakit::class)->withPivot('value_cf');
    }

    public function detailriwayatgejala()
    {
        return $this->hasMany(DetailRiwayatGejala::class, 'id_gejala', 'id');
    }
}
