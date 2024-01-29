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
        'id_nilai_keyakinan',
    ];

    public function detailPenyakit()
    {
        return $this->hasMany(DetailPenyakit::class, 'id_gejala', 'id');
    }

    public function nilaiKeyakinan()
    {
        return $this->belongsTo(NilaiKeyakinan::class, 'id_nilai_keyakinan', 'id');
    }
}
