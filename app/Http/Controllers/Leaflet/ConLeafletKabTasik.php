<?php

namespace App\Http\Controllers\Leaflet;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Leaflet\ConBencana;

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

    public function getLeaflet_totalbencana_kecamatan(){
        //Data yang muncul pertama filtering by tahun saat ini
        $tahun_sekarang = date("Y");
        $jumhari_desember = cal_days_in_month(CAL_GREGORIAN, 12, $tahun_sekarang);    
        $tgl_awal  = $tahun_sekarang."-01-01"; 
        $tgl_akhir = $tahun_sekarang."-12-".$jumhari_desember." 23:59";

        $ConBencana = new ConBencana();
        $json_leaflet_kecamatan = $this->json_leaflet_kecamatan();

        //get total bencana dan taksiran kerugian
        $get_bencana_kecamatan = $ConBencana->get_bencana_kecamatan($tgl_awal,$tgl_akhir);
        $total_bencana = $get_bencana_kecamatan['total_kejadian'];
        $total_taksiran_kerugian = number_format($get_bencana_kecamatan['total_taksiran_kerugian'],0,',','.');

        foreach ($json_leaflet_kecamatan as $val_leaflet_kec) {
            $type = $val_leaflet_kec['type'];
            $geometry = $val_leaflet_kec['geometry'];
            $properties = $val_leaflet_kec['properties'];
            $kd_kecamatan = $properties['kd_kecamatan'];

            foreach ($get_bencana_kecamatan['data_detail'] as $val_bencana_kecamatan) {
                if ($val_bencana_kecamatan['kd_kecamatan'] == $kd_kecamatan) {
                    $features[] = array(
                        "type"       => $type,
                        "geometry"   => $geometry,
                        "properties" => array(
                            "KDPPUM"       => $properties['KDPPUM'],
                            "nm_provinsi"  => $properties['nm_provinsi'],
                            "no_kab_kota"  => $properties['no_kab_kota'],
                            "kd_kab_kota"  => $properties['kd_kab_kota'],
                            "KDPKAB"       => $properties['KDPKAB'],
                            "nm_kabupaten" => $properties['nm_kabupaten'],
                            "no_kecamatan" => $properties['no_kecamatan'],
                            "kd_kecamatan" => $properties['kd_kecamatan'],
                            "KDCPUM"       => $properties['KDCPUM'],
                            "nm_kecamatan" => $properties['nm_kecamatan'],
                            "total_kejadian" => $val_bencana_kecamatan['total_kejadian'],
                            "total_taksiran" => number_format($val_bencana_kecamatan['total_taksiran'],0,',','.')
                        ),
                    );
                }
            }
        }

        $data_kecamatan = array(
            "type"     => "FeatureCollection",
            "features" => $features,
        );

        return $data_kecamatan;
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