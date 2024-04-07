<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKucing extends Model
{
    use HasFactory;

    protected $table = 'tb_jenis_kucing';

    protected $fillable = [
        'judul',
        'slug',
        'isi',
        'image',
    ];
}
