<?php

namespace App\Http\Controllers\Leaflet;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ConLeafletKabTasik extends Controller
{
    public function getLeaflet_totalbencana_desa(){
        $json_leaflet_desa = $this->json_leaflet_desa();

        $data_desa = array(
            "type"     => "FeatureCollection",
            "features" => $json_leaflet_desa,
        );

        return $data_desa;
    }

    public function json_leaflet_desa(){

        $json_desa_kabtasik = file_get_contents(base_path('app/Http/Controllers/Leaflet/kabtasik_desa.json'), true);
        $jsons = json_decode($json_desa_kabtasik, true);
        $features = $jsons['features'];

        return $features;
    }

    public function json_leaflet_kecamatan(){

        $json_kecamatan_kabtasik = file_get_contents(base_path('app/Http/Controllers/Leaflet/kabtasik_kecamatan.json'), true);
        $jsons = json_decode($json_kecamatan_kabtasik, true);
        $features = $jsons['features'];
 
        return $features;

    }
}