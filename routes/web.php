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

Route::get('produk/list', function () {
    $produk = DB::table('produk')->get();
    foreach ($produk as $data){
        echo $data->id_produk.". ".$data->nama_produk." - Rp".$data->hargajual_produk."<br>"; 
    }
});

Route::resource('produk', ProdukController::class);