<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ConInfografis extends Controller
{
    public function index(){

        return view('frontend.pages.infografis_bencana.index');
    }

}