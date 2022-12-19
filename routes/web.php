<?php

use App\Http\Controllers\ArtistaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MainController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GaleriaController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CategoriesMuralController;
use App\Http\Controllers\MuralController;


Auth::routes();
// publica
Route::get('/', [HomeController::class, 'index']);
Route::get('/artista/{id}', [HomeController::class, 'show']);

// permissions
Route::post('artists/storePerfil', [ArtistController::class, 'storePerfil'])->middleware('can:artists.storePerfil')->name('artists.storePerfil');

Route::resource('artistas', ArtistaController::class)->names('artistas');
Route::resource('artists', ArtistController::class)->except('show')->names('artists');

Route::get('/events/misEventos', [EventController::class, 'misEventos'])->name('events.misEventos');
Route::resource('events', EventController::class)->names('events');
// Publica
Route::get('allevents/{categoria}', [EventController::class, 'CategoriaEvento'])->name('evento.categoria');

Route::resource('categories', CategoryController::class)->except('show')->names('categories');

Route::resource('users', UserController::class)->only('index', 'edit', 'update', 'destroy')->names('users');


Route::resource('roles', RoleController::class)->names('roles');

// publica
Route::get('/home', [HomeController::class, 'index'])->name('home');

// solo admin
Route::post('/home', [MainController::class, 'store'])->middleware('can:home.store')->name('home.store');
// Route::post('/home', [MainController::class, 'store'])->name('home.store');
Route::get('/home/create', [MainController::class, 'create'])->middleware('can:home.create')->name('home.create');
//  Route::get('/home/create', [MainController::class, 'create'])->name('home.create');
Route::get('/home/{id}/edit', [MainController::class, 'edit'])->middleware('can:home.edit')->name('home.edit');
Route::put('/home/{id}', [MainController::class, 'update'])->middleware('can:home.update')->name('home.update');
Route::delete('home/deleteimage/{id}', [MainController::class, 'deleteimage'])->middleware('can:home.deleteimage')->name('home.deleteimage');
// permissions
Route::resource('galerias', GaleriaController::class)->except('index')->names('galerias');
// ruta de murales
Route::resource('categories-murales', CategoriesMuralController::class)->except('show')->names('categories-murales');

Route::resource('murales', MuralController::class)->except('show')->names('murales');
// Publica
Route::get('allmurales', [MuralController::class, 'allMurales'])->name('components.allMurales');
Route::get('allmurales/{categoria}', [MuralController::class, 'CategoriaMural'])->name('mural.categoria');

Route::delete('artistas/deleteimage/{id}', [ArtistaController::class, 'deleteimage'])->middleware('can:artistas.deleteimage')->name('artistas.deleteimage');
Route::delete('artistas/deletecover/{id}', [ArtistaController::class, 'deletecover'])->middleware('can:artistas.deletecover')->name('artistas.deletecover');

Route::group(['middleware' => ['auth']], function () {

    // favoritos galeria
    Route::get('user/wishlist', [WishlistController::class, 'index'])->name('user.wishlist');
    Route::post('add-wishlist', [WishlistController::class, 'storewishlist']);
    Route::post('remove-from-wishlist', [WishlistController::class, 'removewishlistitem']);



    // favoritos eventos
    Route::get('user/wishlist-event', [WishlistController::class, 'indexevent'])->name('user.wishlistevent');
    Route::post('add-wishlist-event', [WishlistController::class, 'storewishlistevent']);
    Route::post('remove-from-wishlist-event', [WishlistController::class, 'removewishlistitemevent']);

    // Favoritos murales
    Route::get('user/wishlist-mural', [WishlistController::class, 'indexMural'])->name('user.wishlistmural');
    Route::post('add-wishlist-mural', [WishlistController::class, 'storewishlistmural']);
    Route::post('remove-from-wishlist-mural', [WishlistController::class, 'removewishlistmural']);

});
