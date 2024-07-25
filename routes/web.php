<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\messageController;
use App\Http\Controllers\midtransController;
use App\Http\Controllers\payController;
use App\Http\Controllers\product1Controller;
use App\Http\Controllers\produkController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\webhostController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('index');
});


Route::fallback(function () {
    return view('produks.error');
});

Route::get('index', [homeController::class, 'index']);


Route::get('message', [messageController::class, 'index']);
Route::get('read/{id}', [messageController::class, 'read']);
Route::post('report', [messageController::class, 'report']);
Route::post('whatsapp', [messageController::class, 'shareViaWhatsApp']);
Route::post('copy', [messageController::class, 'copy']);



// produk 2
Route::get('luxuri/{id}', [produkController::class, 'index']);
Route::get('dua', [produkController::class, 'produk2']);
Route::post('ucapanpdua', [produkController::class, 'ucapan']);
Route::post('createdua', [produkController::class, 'create']);
Route::post('update/{id}', [produkController::class, 'update']);
Route::post('daftartamu2', [produkController::class, 'daftartamu']);
Route::delete('delete/{id}', [produkController::class, 'destroy']);


// produk 1
Route::get('ekonomi/{id}', [product1Controller::class, 'index']);
Route::get('satu', [product1Controller::class, 'produk1']);
Route::post('createsatu', [product1Controller::class, 'create']);
Route::post('editstory/{id}', [product1Controller::class, 'update']);
Route::post('story/{id}', [product1Controller::class, 'story']);
Route::post('ucapanpsatu', [product1Controller::class, 'ucapan']);




Route::get('pay', [payController::class, 'indexpay']); //admin only
Route::post('pay/{id}', [payController::class, 'pay']);
Route::post('confirpay/{id}', [payController::class, 'confir']);


Route::get('profile/{id}', [profileController::class, 'index']);
Route::get('product', [profileController::class, 'product']);
Route::post('discount', [profileController::class, 'discount']);


// Route::post('/donation', [midtransController::class, 'store']);



Route::get('login', [authController::class, 'login']);
Route::post('login', [authController::class, 'validasi']);
Route::get('register', [authController::class, 'registerV']);
Route::post('register', [authController::class, 'register']);
Route::get('logout', [authController::class, 'logout']);





// untuk 000webhost
Route::get('/storage/assets/{filename}', [webhostController::class, 'displayImage'])->name('image.display');