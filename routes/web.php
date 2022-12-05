<?php
use App\Http\Controllers\ArtistaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MainController;
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
Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/home', [MainController::class,'store']);
Route::get('/home/create', [MainController::class,'create']);
Route::get('/home/{id}/edit', [MainController::class,'edit']);
Route::put('/home/{id}', [MainController::class,'update']);
Route::resource('galerias',  App\Http\Controllers\GaleriaController::class)->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/artista/{id}',  [App\Http\Controllers\HomeController::class, 'show']);
Route::resource('artistas', ArtistaController::class)->middleware('auth');
Route::delete('artistas/deleteimage/{id}', [App\Http\Controllers\ArtistaController::class,'deleteimage']);
Route::delete('artistas/deletecover/{id}', [App\Http\Controllers\ArtistaController::class,'deletecover']);

