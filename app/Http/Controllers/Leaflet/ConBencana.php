<?php

namespace App\Http\Controllers\Leaflet;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ConBencana extends Controller
{
    public function get_bencana_kecamatan($tgl_awal,$tgl_akhir){
        // $tahun_sekarang = date("Y");
        $kecamatan = DB::table('tbl_reff_kode_kecamatan')
            ->select('id','nm_kecamatan','kd_kecamatan')
            ->get();
        
        $jns_bencana = DB::table('tbl_reff_jenisbencana')
            ->select('tbl_reff_jenisbencana.id','tbl_reff_jenisbencana.jns_bencana')
            ->get();

        $lap_bencana = DB::table('tbl_lap_bencana')
            ->join('tbl_reff_jenisbencana', 'tbl_lap_bencana.jns_bencana', '=', 'tbl_reff_jenisbencana.id')
            ->join('tbl_lap_bencana_lokasi', 'tbl_lap_bencana.id', '=', 'tbl_lap_bencana_lokasi.kd_lap_bencana')
            ->join('tbl_reff_kode_kecamatan', 'tbl_lap_bencana_lokasi.kd_kecamatan', '=', 'tbl_reff_kode_kecamatan.id')
            ->select(
                'tbl_lap_bencana.id',
                'tbl_lap_bencana.jns_bencana',
                'tbl_reff_jenisbencana.jns_bencana as nm_jns_bencana',
                'tbl_lap_bencana.taksiran_kerugian',
                'tbl_lap_bencana_lokasi.kd_kecamatan'
                )
            ->selectRaw('GROUP_CONCAT(tbl_reff_kode_kecamatan.nm_kecamatan) as nm_kecamatan')
            // ->whereYear('tbl_lap_bencana.tgl_kejadian_bencana', '=', $tahun_sekarang)
            ->whereBetween('tbl_lap_bencana.tgl_kejadian_bencana', [$tgl_awal, $tgl_akhir])
            ->groupBy('tbl_lap_bencana.id')
            ->groupBy('tbl_lap_bencana.jns_bencana')
            ->groupBy('tbl_reff_jenisbencana.jns_bencana')
            ->groupBy('tbl_lap_bencana.taksiran_kerugian')
            ->groupBy('tbl_lap_bencana_lokasi.kd_kecamatan')
            ->orderBy('tbl_lap_bencana.id', 'ASC')
            ->get();
        
        $total_kejadian_kab = 0;
        $total_taksiran_kerugian = 0;
        foreach($kecamatan as $get_kec){
            $id_kecamatan = $get_kec->id;
            $kode_kecamatan = $get_kec->kd_kecamatan;
            $nm_kecamatan = $get_kec->nm_kecamatan;

            $lapor_bencana = array();
            $total_kejadian = 0;
            $total_taksiran = 0;
            
            foreach($jns_bencana as $get_bencana){
                $id_jns_bencana = $get_bencana->id;
                $id_bencana = array();
                foreach($lap_bencana as $get_lap_bencana){
                    $kd_kecamatan = $get_lap_bencana->kd_kecamatan;
                    $kd_jns_bencana = $get_lap_bencana->jns_bencana;
                    if(($kd_kecamatan == $id_kecamatan) && ($kd_jns_bencana == $id_jns_bencana)){
                        $id_bencana[] = $get_lap_bencana->id;
                        $total_taksiran_kerugian += $get_lap_bencana->taksiran_kerugian;
                        $total_taksiran += $get_lap_bencana->taksiran_kerugian;
                    }
                }
                $count_kejadian = count($id_bencana);
                $total_kejadian += $count_kejadian;

            }
            $total_kejadian_kab += $total_kejadian;
            $data_detail[] = array(
                "id"             => $id_kecamatan,
                "kd_kecamatan"   => $kode_kecamatan,
                "nm_kecamatan"   => $nm_kecamatan,
                "total_kejadian" => $total_kejadian,
                "total_taksiran" => $total_taksiran
            );
        }

        $data = array(
            "total_kejadian"            => $total_kejadian_kab,
            "total_taksiran_kerugian"   => $total_taksiran_kerugian,
            "data_detail"               => $data_detail
        );

        return $data;
    }
}