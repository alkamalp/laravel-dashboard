<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Testing CekUser Middleware
Route::group(['middleware' => ['web', 'cekuser:1']],
function(){
    Route::get('kategori/data', 'KategoriController@listData')->name('kategori.data');
    Route::resource('kategori', 'KategoriController');
    // Route kategori, perlu use kategori controller belum buat
    // Route::resource('kategori', KategoriController::class);
});

// Testing Helpers
// Route::get('tanggal', function(){
//     echo tanggal_indonesia(date('Y-m-d'));
// });

// Route::get('uang', function(){
//     echo "Rp. ". format_uang(1250000000);
// });

// Route::get('terbilang', function(){
//     echo ucwords(terbilang(12578600));
// });