<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class,'index'] );
Route::get('/home', [HomeController::class,'redirecta'] );
Route::get('/about', [HomeController::class,'about'] );
Route::get('/services', [HomeController::class,'services'] );
Route::get('/menu', [HomeController::class,'menu'] );
Route::get('/reservation', [HomeController::class,'reservation'] );
Route::get('/team', [HomeController::class,'team'] );
Route::get('/testimonial', [HomeController::class,'testimonial'] );
Route::get('/contact', [HomeController::class,'contact'] );

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
