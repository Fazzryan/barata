<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*Custom Controller*/
use App\Http\Controllers\Leaflet\ConLeafletKabTasik;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/get_json_leaflet_desa', [ConLeafletKabTasik::class, 'json_leaflet_desa']);
Route::get('/get_json_leaflet_kecamatan', [ConLeafletKabTasik::class, 'json_leaflet_kecamatan']);