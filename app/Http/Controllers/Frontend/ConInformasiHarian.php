<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ConInformasiHarian extends Controller
{
    public function index(){

        return view('frontend.pages.informasi_harian.index');
    }

}