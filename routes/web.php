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

Auth::routes();

Route::post('post-login', [\App\Http\Controllers\Auth\AuthController::class, 'postLogin'])->name('login.post');

Route::get('registration', [\App\Http\Controllers\Auth\AuthController::class, 'registration'])->name('register');

Route::post('post-registration', [\App\Http\Controllers\Auth\AuthController::class, 'postRegistration'])->name('register.post');

Route::get('qr_create', function () {
	return view('qrcode.create');
})->middleware("auth");


Route::group(['middleware' => 'auth'], function () {

	Route::resource('roles', '\App\Http\Controllers\RoleController');

	Route::get('/qr_create', [\App\Http\Controllers\QRGenerateController::class, 'create'])->name('qr.create');


	Route::get('logout', [\App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('logout');

	Route::resource('qr', '\App\Http\Controllers\QRGenerateController');

	//qr export
	Route::post('qr_export','\App\Http\Controllers\QRGenerateController@qr_export')->name('qr_export');

	//qr generate
	Route::get('generate_qr/{id}','\App\Http\Controllers\QRGenerateController@generate_qr')->name('qr.generate_qr');

	//qr detail
	Route::get('qr_detail/{id}','\App\Http\Controllers\QRGenerateController@qr_detail')->name('qr_detail');

	Route::get('update_remark',[\App\Http\Controllers\QRGenerateController::class, 'update_remark'])->name('update_remark');
	Route::get('update_remark', [\App\Http\Controllers\QRGenerateController::class, 'update_remark'])->name('update_remark');

	Route::resource('users', 'App\Http\Controllers\UserController');

	Route::post('/qr_download', [\App\Http\Controllers\QRGenerateController::class, 'qr_download'])->name('qr.download');

	Route::get('qr/destroy/{id}', [\App\Http\Controllers\QRGenerateController::class, 'destroy'])->name('qr.destroy');


	// PC Sale
	Route::resource('/pc_sale', '\App\Http\Controllers\PcSaleController');
});