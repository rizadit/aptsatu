<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RJenisKanal extends Model
{
    use HasFactory;
    protected $table = 'R_JENISKANAL';
    protected $primaryKey = 'ID_JENISKANAL';
    public $timestamps = false;

    protected $fillable = [
        'ID_JENISKANAL',
        'URAIAN_JENISKANAL',
    ];
}
 