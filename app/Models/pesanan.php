<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pesanan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'id_lapangan',
        'waktu_mulai',
        'waktu_selesai',
        'biaya',
    ];
}
