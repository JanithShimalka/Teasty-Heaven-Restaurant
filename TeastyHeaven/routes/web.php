<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class,'index'] );
Route::get('/home', [HomeController::class,'redirecta'] );
Route::get('/about', [HomeController::class,'about'] );
Route::get('/services', [HomeController::class,'services'] );
Route::get('/menu', [HomeController::class,'menu'] );
Route::get('/reservation', [HomeController::class,'reservation'] );
Route::get('/myres', [HomeController::class,'myres'] );
Route::get('/team', [HomeController::class,'team'] );
Route::get('/testimonial', [HomeController::class,'testimonial'] );
Route::get('/contact', [HomeController::class,'contact'] );


Route::get('/delres/{id}', [HomeController::class,'delres'] );
Route::get('/appoved/{id}', [AdminController::class,'appoved'] );
Route::get('/canceled/{id}', [AdminController::class,'canceled'] );
Route::get('/delemp/{id}', [AdminController::class,'delemp'] );
Route::get('/dltmenu/{id}', [AdminController::class,'dltmenu'] );
Route::get('/dltsup/{id}', [AdminController::class,'dltsup'] );
Route::get('/dltinv/{id}', [AdminController::class,'dltinv'] );

Route::get('/empMng', [AdminController::class,'empMng'] );
Route::get('/tblres', [AdminController::class,'tblres'] );
Route::get('/mnumng', [AdminController::class,'mnumng'] );
Route::get('/addmenu', [AdminController::class,'addmenu'] );
Route::get('/supmng', [AdminController::class,'supmng'] );
Route::get('/addsup', [AdminController::class,'addsup'] );
Route::get('/invmng', [AdminController::class,'invmng'] );
Route::get('/additm', [AdminController::class,'additm'] );
Route::post('/saveEmp', [AdminController::class,'empSave'] );
Route::post('/table', [HomeController::class,'booktable'] );
Route::post('/uploadMenu', [AdminController::class,'uploadMenu'] );
Route::post('/uploadSup', [AdminController::class,'uploadSup'] );
Route::post('/uploadinv', [AdminController::class,'uploadinv'] );
Route::post('/review', [HomeController::class,'review'] );

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
