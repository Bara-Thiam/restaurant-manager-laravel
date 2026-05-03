<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategorieController;
use App\Http\Controllers\Admin\PlatController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\CommandeController;

// Page d'accueil
Route::get('/', function () {
    return view('welcome');
});

// Routes Breeze (profil)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Routes commandes (auth requise)
Route::middleware('auth')->group(function () {
    Route::resource('commandes', CommandeController::class);
    Route::get('commandes/{commande}/ticket', [CommandeController::class, 'ticket'])
         ->name('commandes.ticket');
});

// Routes admin (auth + role admin)
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {

    // Catégories
    Route::resource('categories', CategorieController::class);

    // Plats
    Route::resource('plats', PlatController::class);

    // Tables
    Route::get('tables/archives', [TableController::class, 'archives'])->name('tables.archives');
    Route::post('tables/{id}/restore', [TableController::class, 'restore'])->name('tables.restore');
    Route::resource('tables', TableController::class);

    // Menus
    Route::get('menus/archives', [MenuController::class, 'archives'])->name('menus.archives');
    Route::post('menus/{id}/restore', [MenuController::class, 'restore'])->name('menus.restore');
    Route::resource('menus', MenuController::class);
});

Route::middleware('auth')->get('/admin/menu', [MenuController::class, 'clientView'])->name('admin.menu');

Route::get('/reserver', fn() => view('reserver'))->name('reserver');
Route::get('/a-propos', fn() => view('a-propos'))->name('a-propos');
Route::get('/contact',  fn() => view('contact'))->name('contact');

require __DIR__.'/auth.php';