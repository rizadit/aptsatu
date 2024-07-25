<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RJenisLayanan extends Model
{
    use HasFactory;
    // Nama tabel
    protected $table = 'R_JENISLAYANAN';

    // Primary key
    protected $primaryKey = 'ID_JENISLAYANAN';

    // Kolom yang dapat diisi
    protected $fillable = [
        'URAIAN_JENISLAYANAN',
        'ID_DEPARTEMEN'
    ];

    // Definisi relasi dengan model RDepartemen
    public function departemen()
    {
        return $this->belongsTo(RDepartemen::class, 'ID_DEPARTEMEN', 'ID_DEPARTEMEN');
    }
}
