<?php
use App\Http\Controllers\ArtistaController;
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
    return view('auth.login'); //PABLO - REEMPLAZO DE LA VISTA "WELCOME" POR LA VISTA DEL LOGIN ("auth.login")
});

Route::resource('artista', ArtistaController::class)->middleware('auth'); //PABLO - ..."->middleware('auth')" AGREGADO PARA QUE NO SE PUEDA ACCEDER A MENOS QUE SE ESTE LOGEADO

Auth::routes(['register'=>false,'reset'=>false]); //PABLO - "['register'=>false,'reset'=>false]" AGREGADO PARA QUE DESAPAREZCAN LAS OPCIONES DE "REGISTER" Y "FORGOT YOUR PASSWORD?"

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');