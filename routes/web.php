<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [\App\Http\Controllers\QRGenerateController::class, 'create']);

Route::resource('qr','\App\Http\Controllers\QRGenerateController');

Route::post('/qr_download', [\App\Http\Controllers\QRGenerateController::class, 'qr_download'])->name('qr.download');

Route::get('qr/destroy/{id}',[\App\Http\Controllers\QRGenerateController::class, 'destroy'])->name('qr.destroy');