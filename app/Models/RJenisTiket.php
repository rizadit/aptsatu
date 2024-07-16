<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RJenisTiket extends Model
{
    use HasFactory;

    protected $table = 'r_jenis_tiket';
    protected $primaryKey = 'ID_JENIS_TIKET';
    protected $fillable = ['JENIS_TIKET', 'URAIAN_JENIS_TIKET'];
    public $timestamps = true;
}
