<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengunjungModel extends Model
{
    use HasFactory;
    /**
     * fillable
     *
     * @var array
     */
    protected $table = 'R_PENGUNJUNG';
    protected $primaryKey = 'ID_PENGUNJUNG';
    public $timestamps = false;
    protected $fillable = [
        'TELEPON',
        'NIP_NIK',
        'NAMA',
        'EMAIL',
        'INSTANSI_UNIT',
        'ID_KANTOR'
    ];
}
