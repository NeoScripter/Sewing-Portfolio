<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Global\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/galleries', [GalleryController::class, 'index'])->name('admin.galleries.index');
    Route::get('/admin/galleries/{gallery}', [GalleryController::class, 'show'])->name('admin.galleries.show');
    Route::post('/admin/galleries/{gallery}/images', [GalleryController::class, 'storeImage'])->name('admin.images.store');
    Route::delete('/admin/images/{image}', [GalleryController::class, 'destroyImage'])->name('admin.images.destroy');
});
