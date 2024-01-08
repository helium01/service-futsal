<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tempatFutsal extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'nama_tempat',
        'fasilitas',
        'alamat',
        'no_hp',
        'status',
        'lng',
        'lat',
    ];
}
