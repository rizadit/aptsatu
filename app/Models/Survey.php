<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;
    protected $fillable = [
        'administrasi_layanan',
        'prosedur_layanan',
        'waktu_layanan',
        'biaya_layanan',
        'kompetensi_petugas',
        'kesopanan_petugas',
        'kualitas_sarana',
        'ketersediaan_kanal',
        'saran_kritik',
        'ID_LAYANAN',
        'STATUS',
    ];
}
