<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PanelController;
use App\Http\Controllers\Global\ContactController;
use App\Http\Controllers\Global\CategoryController as GlobalCategoryController;
use App\Http\Controllers\Global\HomeController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\Global\PieceController;
use Illuminate\Support\Facades\Mail;

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

Route::get('/portfolio', [GlobalCategoryController::class, 'index'])->name('portfolio');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::get('/portfolio/{id}', [GlobalCategoryController::class, 'show'])->name('portfolio.piece');

Route::post('/contact/send', [ContactFormController::class, 'send'])->name('contact.send');

Route::prefix('admin')->group(function () {
    Route::get('/', [PanelController::class, 'index'])->name('admin.category.index');
    Route::post('/category', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::delete('/category/{category}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');
    Route::get('/edit-category/{category}', [CategoryController::class, 'show'])->name('admin.category.show');
    Route::put('/category/{category}', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::post('/images', [ImageController::class, 'store'])->name('admin.images.store');
    Route::delete('/images/{image}', [ImageController::class, 'destroy'])->name('admin.images.destroy');
    Route::get('/home', [PanelController::class, 'home'])->name('admin.home.index');
    Route::get('/contacts', [PanelController::class, 'contacts'])->name('admin.contacts.index');
    Route::post('/content', [PanelController::class, 'storeOrUpdate'])->name('admin.content.storeOrUpdate');

});
