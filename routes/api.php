<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Pelanngan
Route::get('pelanggan','App\Http\Controllers\api\pelangganController@getPelanggan');
//update API Pelanggan by ID
Route::put('pelanggan/{id}','App\Http\Controllers\api\pelangganController@updatePelanggan');

//get API Pelanggan by ID
Route::get('pelanggan/{id}','App\Http\Controllers\api\pelangganController@getPelangganById');

//Post API Pelanggan
Route::post('pelanggan','App\Http\Controllers\api\pelangganController@createOrUpdatePelanggan');

//delete API Pelanggan by ID
Route::delete('pelanggan/{id}','App\Http\Controllers\api\pelangganController@deletePelanggan');


//Barang
Route::get('barang','App\Http\Controllers\api\barangController@getBarang');
//update API Barang by ID
Route::put('barang/{id}','App\Http\Controllers\api\barangController@updateBarang');

//get API Barang by ID
Route::get('barang/{id}','App\Http\Controllers\api\barangController@getBarangById');

//Post API Barang
Route::post('barang','App\Http\Controllers\api\barangController@createOrUpdateBarang');

//delete API Barang by ID
Route::delete('barang/{id}','App\Http\Controllers\api\barangController@deleteBarang');


//Penjualan
Route::get('penjualan','App\Http\Controllers\api\penjualanController@getPenjualan');
//update API Penjualan by ID
Route::put('penjualan/{id}','App\Http\Controllers\api\penjualanController@updatePenjualan');

//get API Penjualan by ID
Route::get('penjualan/{id}','App\Http\Controllers\api\penjualanController@getPenjualanById');

//Post API Penjualan by ID
Route::post('penjualan','App\Http\Controllers\api\penjualanController@createOrUpdatePenjualan');

//delete API Penjualan by ID
Route::delete('penjualan/{id}','App\Http\Controllers\api\penjualanController@deletePenjualan');



//Item_Penjualan
Route::get('item-penjualan','App\Http\Controllers\api\item_penjualanController@getItemPenjualan');
//update API Item_Penjualan by ID
Route::put('item-penjualan/{id}','App\Http\Controllers\api\item_penjualanController@updateItemPenjualan');

//get API Item_Penjualan by ID
Route::get('item-penjualan/{id}','App\Http\Controllers\api\item_penjualanController@getItemPenjualanById');

//Post API Item_Penjualan
Route::post('item-penjualan','App\Http\Controllers\api\item_penjualanController@createOrUpdateItemPenjualan');

//delete API Item_Penjualan by ID
Route::delete('item-penjualan/{id}','App\Http\Controllers\api\item_penjualanController@deleteItemPenjualan');