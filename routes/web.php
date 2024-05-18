<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Frontend Uses
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\Frontend\ConBeranda;
use App\Http\Controllers\Frontend\ConInformasiHarian;
use App\Http\Controllers\Frontend\ConInfografis;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Daftarkan rute web aplikasi disini.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [ConBeranda::class, 'index'])->name('beranda');

Route::group(['as' => 'fe.', 'prefix' => '/datin'],  function () {
    Route::get('/beranda', [ConBeranda::class, 'index'])->name('beranda');
    Route::get('/informasi_harian', [ConInformasiHarian::class, 'index'])->name('informasi_harian');
    Route::get('/infografis', [ConInfografis::class, 'index'])->name('infografis');
});
