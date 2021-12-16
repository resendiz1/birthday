<?php

use App\Http\Controllers\nombresController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
// | contains the "web" middleware group. Now create something great!
// |
// */

// Route::get('/', function () {
//     return view('inicio');
// })->name('inicio');


Route::get('/', [nombresController::class, 'index'])->name('inicio');

Route::post('/correo{nombre}', [nombresController::class, 'mail'])->name('correo');

Route::post('/', [nombresController::class, 'store'])->name('nombres.store');
