<?php

namespace App\Http\Controllers\Mysql;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VerifikasiController extends Controller
{
    public function index(){
        return view('mysql.verifikasi');
    }
}
