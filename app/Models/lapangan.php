<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lapangan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_tempat',
        'nomor_lapangan',
        'deskripsi_lapangan',
        'harga_siang_perjam',
        'harga_malam_perjam',
        'gambar',
    ];
}
