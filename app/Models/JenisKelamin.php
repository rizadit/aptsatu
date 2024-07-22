<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKelamin extends Model
{
    use HasFactory;

    protected $table = 'R_JENISKELAMIN';
    protected $primaryKey = 'ID_JENISKELAMIN';
    public $timestamps = false;

    protected $fillable = [
        'ID_JENISKELAMIN',
        'URAIAN_JENISKELAMIN',
    ];
}
