<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Leaflet\ConLeafletKabTasik;
use App\Http\Controllers\Frontend\ConPetaBencana;

class ConBeranda extends Controller
{
    public function index(){
        $ConPetaBencana = new ConPetaBencana();
        $index_Petadesa = $ConPetaBencana->index_Petadesa();

        return $index_Petadesa;
    }

}