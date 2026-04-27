<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Admin\MenuController;

Route::get('/', function () {
    return view('welcome');
});

// Routes admin
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {

    // Tables
    Route::get('tables/archives', [TableController::class, 'archives'])->name('tables.archives');
    Route::post('tables/{id}/restore', [TableController::class, 'restore'])->name('tables.restore');
    Route::resource('tables', TableController::class);

    // Menus
    Route::get('menus/archives', [MenuController::class, 'archives'])->name('menus.archives');
    Route::post('menus/{id}/restore', [MenuController::class, 'restore'])->name('menus.restore');
    Route::resource('menus', MenuController::class);

});