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



Route::get('/', [\App\Http\Controllers\Auth\AuthController::class, 'index'])->name('login');

Route::post('post-login', [\App\Http\Controllers\Auth\AuthController::class, 'postLogin'])->name('login.post'); 

Route::get('registration', [\App\Http\Controllers\Auth\AuthController::class, 'registration'])->name('register');

Route::post('post-registration', [\App\Http\Controllers\Auth\AuthController::class, 'postRegistration'])->name('register.post');
	
// Route::get('/', function () {
//     return redirect('login');
// })->middleware('auth');

Route::get('qr_create',function(){
    return view('qrcode.create');
})->middleware("auth");


Route::group(['middleware'=>'auth'],function(){

	Route::get('/qr_create', [\App\Http\Controllers\QRGenerateController::class, 'create'])->name('qr.create');

	

	Route::get('logout', [\App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('logout');

	Route::resource('qr','\App\Http\Controllers\QRGenerateController');

	Route::resource('users','App\Http\Controllers\UserController');

	Route::post('/qr_download', [\App\Http\Controllers\QRGenerateController::class, 'qr_download'])->name('qr.download');

	Route::get('qr/destroy/{id}',[\App\Http\Controllers\QRGenerateController::class, 'destroy'])->name('qr.destroy');
});
