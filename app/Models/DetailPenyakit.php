<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenyakit extends Model
{
    use HasFactory;

    protected $table = 'gejala_penyakit';

    protected $fillable = [
        'penyakit_id',
        'gejala_id',
        'value_cf'
    ];

    public function penyakit()
    {
        return $this->belongsTo(Penyakit::class, 'penyakit_id', 'id');
    }

    public function gejala()
    {
        return $this->belongsTo(Gejala::class, 'gejala_id', 'id');
    }
}
