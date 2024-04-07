<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenyakitKulit extends Model
{
    use HasFactory;

    protected $table = 'tb_penyakit_kulit';

    protected $fillable = [
        'judul',
        'slug',
        'isi',
        'image',
    ];
}
