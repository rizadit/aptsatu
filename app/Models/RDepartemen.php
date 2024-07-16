<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RDepartemen extends Model
{
    use HasFactory;

    protected $table = 'r_departemen';
    protected $primaryKey = 'ID_DEPARTEMEN';
    protected $fillable = ['DEPARTEMEN', 'URAIAN_DEPARTEMEN'];
}