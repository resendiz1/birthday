<?php

use App\Http\Controllers\frasesController;
use App\Http\Controllers\imagenesController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\nombresController;

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
Route::get('/buscar', [nombresController::class, 'buscar'])->name('cumple.buscar');
Route::post('/buscar',[nombresController::class, 'buscado'])->name('buscado');


//ruta de prueba de el agregado de frases
Route::get('/frases', [frasesController::class, 'index'])->name('frases.index');
Route::post('/frases',[frasesController::class, 'create'])->name('frases.create');
Route::post('/frases/{$frase}', [frasesController::class, 'delete'])->name('frases.delete');



//Ruta que va a servir para el agregado de imagenes
Route::get('/imagenes', [imagenesController::class, 'index'])->name('imagen.index');
Route::post('/imagenes', [imagenesController::class, 'create'])->name('imagen.create');






