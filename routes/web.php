<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategorieController;
use App\Http\Controllers\Admin\PlatController;
use App\Http\Controllers\Admin\MenuController;

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Routes Admin — Groupe B (Yayra Joanella)
|--------------------------------------------------------------------------
|
| Toutes les routes sont préfixées par /admin
| et utilisent le préfixe de nom "admin."
|
| Exemple :
|   route('admin.categories.index') → GET /admin/categories
|   route('admin.plats.store')      → POST /admin/plats
|
| NOTE : en production, ajouter le middleware 'auth' et 'admin' ici :
|   Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(...)
|
*/

Route::prefix('admin')->name('admin.')->group(function () {

    // CRUD Catégories
    Route::resource('categories', CategorieController::class);

    // CRUD Plats (avec upload d'image)
    Route::resource('plats', PlatController::class);

    // Menu client (vue publique des plats par catégorie)
    Route::get('menu', [MenuController::class, 'index'])->name('menu');
});
