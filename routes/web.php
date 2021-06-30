<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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
Route::resource('buku','BukuController');
Auth::routes();

Route::post('/create-book',  '\App\Http\Controllers\BukuController@create' );
Route::post('/store-book',  '\App\Http\Controllers\BukuController@store' );
Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/upload-form', function() {return view('upload-form');});
Route::get('/upload-file',  '\App\Http\Controllers\BukuController@upload' );
Route::get('/unduh-gambar/{path}', [ BukuController::class, 'unduh' ]);
Route::get('/cetak-book','BukuController@cetak')->name('cetak-book');