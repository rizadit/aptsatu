<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPengguna extends Model
{
    use HasFactory;
    protected $table = 'R_JENISPENGGUNA';
    protected $primaryKey = 'ID_JENISPENGGUNA';
    public $timestamps = false;

    protected $fillable = [
        'ID_JENISPENGGUNA',
        'URAIAN_JENISPENGGUNA',
    ];
}
