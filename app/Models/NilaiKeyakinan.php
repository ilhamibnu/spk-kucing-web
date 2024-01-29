<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiKeyakinan extends Model
{
    use HasFactory;

    protected $table = 'tb_nilai_keyakinan';

    protected $fillable = [
        'name',
        'nilai',
    ];

    public function gejala()
    {
        return $this->hasMany(Gejala::class, 'id_nilai_keyakinan', 'id');
    }
}
