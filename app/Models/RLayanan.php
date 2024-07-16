<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RLayanan extends Model
{
    use HasFactory;

    protected $table = 'r_layanan';
    protected $primaryKey = 'ID_LAYANAN';
    protected $fillable = ['LAYANAN', 'URAIAN_LAYANAN'];
}