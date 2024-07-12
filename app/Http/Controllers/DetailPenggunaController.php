<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetailPenggunaController extends Controller
{
    //
    public function index()
    {
        return view('detail-pengguna');
    }
}
