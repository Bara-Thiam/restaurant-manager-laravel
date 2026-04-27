<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\Admin\MenuController;

// Menus (à l'intérieur du groupe admin existant)
Route::get('menus/archives', [MenuController::class, 'archives'])->name('menus.archives');
Route::post('menus/{id}/restore', [MenuController::class, 'restore'])->name('menus.restore');
Route::resource('menus', MenuController::class);