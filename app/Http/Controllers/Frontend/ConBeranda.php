<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Leaflet\ConLeafletKabTasik;

class ConBeranda extends Controller
{
    public function index(){
        $ConLeafletKabTasik = new ConLeafletKabTasik();

        $data_desa = json_encode($ConLeafletKabTasik->getLeaflet_totalbencana_desa());

        return view('frontend.pages.beranda.index',compact('data_desa'));
    }

}