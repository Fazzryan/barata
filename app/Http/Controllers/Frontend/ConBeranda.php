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

        $json_leaflet_desa = $ConLeafletKabTasik->json_leaflet_kecamatan();

        $data_desa = json_encode(array(
            "type"     => "FeatureCollection",
            "features" => $json_leaflet_desa,
        ));

        return view('frontend.pages.beranda.index',compact('data_desa'));
    }

}