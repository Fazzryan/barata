<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ConBeranda extends Controller
{
    public function index(){

        return view('frontend.pages.beranda.index');
    }

}