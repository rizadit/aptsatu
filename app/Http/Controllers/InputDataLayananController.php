<?php
 
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InputDataLayananController extends Controller
{
    public function index()
    {
        return view('input-data-layanan');
    }
}
