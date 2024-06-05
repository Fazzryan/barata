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

        $kecamatan = DB::table('tbl_reff_kode_kecamatan')->orderBy('nm_kecamatan', 'ASC')->get();
        $jenis_bencana = DB::table('tbl_reff_jenisbencana')
            ->where('tupoksi','bpbd')
            ->where('status_jns_bencana','aktif')
            ->orderBy('kelompok_jns_bencana', 'ASC')
            ->get();

        return view('frontend.pages.peta_bencana.peta_kecamatan',compact('data_peta','kecamatan','jenis_bencana'));
    }

    public function index_Petadesa(){
        $ConLeafletKabTasik = new ConLeafletKabTasik();

        $data_peta = json_encode($ConLeafletKabTasik->getLeaflet_totalbencana_desa());

        $kecamatan = DB::table('tbl_reff_kode_kecamatan')->orderBy('nm_kecamatan', 'ASC')->get();
        $desa = DB::table('tbl_reff_kode_desa')->orderBy('nm_desa', 'ASC')->get();
        $jenis_bencana = DB::table('tbl_reff_jenisbencana')
            ->where('tupoksi','bpbd')
            ->where('status_jns_bencana','aktif')
            ->orderBy('kelompok_jns_bencana', 'ASC')
            ->get();

        return view('frontend.pages.peta_bencana.peta_desa',compact('data_peta','kecamatan','desa','jenis_bencana'));
    }

}