<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayananModel extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak mengikuti konvensi penamaan Laravel
    protected $table = 'T_LAYANAN';

    // Tentukan primary key jika tidak menggunakan default 'id'
    protected $primaryKey = 'ID_LAYANAN';

    // Tentukan apakah primary key menggunakan auto-incrementing atau tidak
    public $incrementing = true;

    // Tentukan tipe data dari primary key
    protected $keyType = 'int';

    // Tentukan kolom yang bisa diisi (mass assignable)
    protected $fillable = [
        'NO_ANTRIAN',
        'ID_PENGUNJUNG',
        'SUBJEK',
        'ID_JENISDEPARTEMEN',
        'ID_JENISLAYANAN',
        'ID_JENISKANAL',
        'ID_JENISPRIORITAS',
        'ID_JENISTIKET',
        'ID_JENISPENGGUNA',
        'ID_JENISKELAMIN',
        'DETAIL_UNITKERJA',
        'INITIAL_AGENT',
        'WAKTU_LAYANAN_MULAI',
        'WAKTU_LAYANAN_SELESAI',
        'PERTANYAAN',
        'JAWABAN',
        'NOTE',
        'STATUS',
        'DIBUAT_OLEH',
        'DIBUAT_TANGGAL'
    ];

    // Tentukan kolom yang tidak ingin dimasukkan secara otomatis oleh Eloquent
    protected $guarded = [];

    // Tentukan apakah model harus mencatat timestamps (created_at dan updated_at)
    public $timestamps = false;

    // Tentukan format kolom tanggal jika diperlukan
    // protected $casts = [
    //     'WAKTU_LAYANAN_MULAI' => 'time',
    //     'WAKTU_LAYANAN_SELESAI' => 'time',
    //     'DIBUAT_TANGGAL' => 'time'
    // ];
}
