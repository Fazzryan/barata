<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Leaflet\ConLeafletKabTasik;

class ConPetaBencana extends Controller
{
    public function index_Petakecamatan(){
        $ConLeafletKabTasik = new ConLeafletKabTasik();

        $data_peta = json_encode($ConLeafletKabTasik->getLeaflet_totalbencana_kecamatan());

        return view('frontend.pages.peta_bencana.peta_kecamatan',compact('data_peta'));
    }

    public function index_Petadesa(){
        $ConLeafletKabTasik = new ConLeafletKabTasik();

        $data_peta = json_encode($ConLeafletKabTasik->getLeaflet_totalbencana_desa());

        return view('frontend.pages.peta_bencana.peta_desa',compact('data_peta'));
    }

}