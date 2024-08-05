<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
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

Route::get('/', [ImageController::class, 'index'])->name('gallery.index');
Route::get('/gallery', [ImageController::class, 'index'])->name('gallery.index');
Route::get('/gallery/create', [ImageController::class, 'create'])->name('gallery.create');
Route::post('/gallery/store', [ImageController::class, 'store'])->name('gallery.store');
Route::get('/gallery/{id}/edit', [ImageController::class, 'edit'])->name('gallery.edit');
Route::put('/gallery/{id}/update', [ImageController::class, 'update'])->name('gallery.update');
Route::delete('/gallery/{id}/delete', [ImageController::class, 'destroy'])->name('gallery.destroy');