<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPrioritas extends Model
{
    use HasFactory;

    protected $table = 'R_JENISPRIORITAS';
    protected $primaryKey = 'ID_JENISPRIORITAS';
    public $timestamps = false;

    protected $fillable = [
        'ID_JENISPRIORITAS',
        'URAIAN_JENISPRIORITAS',
    ];
}
