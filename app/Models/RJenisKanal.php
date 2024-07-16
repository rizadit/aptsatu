<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RJenisKanal extends Model
{
    use HasFactory;
    protected $table = 'r_jenis_kanal';
    protected $primaryKey = 'ID_JENISKANAL';
    protected $fillable = ['URAIAN_JENISKANAL'];
    public $timestamps = true;
}
