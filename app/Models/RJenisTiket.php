<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RJenisTiket extends Model
{
    use HasFactory;

    protected $table = 'R_JENISTIKET';
    protected $primaryKey = 'ID_JENISTIKET';
    protected $fillable = ['ID_JENISTIKET', 'URAIAN_JENISTIKET'];
    
}
 