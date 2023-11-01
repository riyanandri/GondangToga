<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

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

// home
Route::get('/', \App\Http\Livewire\Front\Home::class)->name('home');

// plants
Route::get('/plants', \App\Http\Livewire\Front\Plant::class)->name('plants');
Route::get('/plants/{plant:slug}', [\App\Http\Controllers\PlantController::class, 'plantDetail'])->name('plants.detail');

// products
Route::get('/products', \App\Http\Livewire\Front\Product::class)->name('products');

// about us
Route::get('/about-us', \App\Http\Livewire\Front\AboutUs::class)->name('about-us');

Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {
    // dasbor
    Route::get('/dashboard', \App\Http\Livewire\Dashboard::class)->name('dashboard');

    // categories
    Route::get('/categories', \App\Http\Livewire\Category::class)->name('categories.index');
    Route::get('/categories/create', \App\Http\Livewire\Category\Store::class)->name('categories.create');
    Route::get('/categories/{id}/edit', \App\Http\Livewire\Category\Update::class)->name('categories.edit');

    // plants
    Route::get('/plants', \App\Http\Livewire\Plant::class)->name('plants.index');
    Route::get('/plants/create', \App\Http\Livewire\Plant\Store::class)->name('plants.create');
    Route::get('/plants/{id}/edit', \App\Http\Livewire\Plant\Update::class)->name('plants.edit');

    // products
    Route::get('/products', \App\Http\Livewire\Product::class)->name('products.index');
    Route::get('/products/create', \App\Http\Livewire\Product\Store::class)->name('products.create');
    Route::get('/products/{id}/edit', \App\Http\Livewire\Product\Update::class)->name('products.edit');

    // contents
    // Route::get('/contents', \App\Http\Livewire\Article::class)->name('contents.index');
    // Route::get('/contents/create', \App\Http\Livewire\Article\Store::class)->name('contents.create');
    // Route::get('/contents/{id}/edit', \App\Http\Livewire\Article\Update::class)->name('contents.edit');

    // spots
    Route::get('/spots', \App\Http\Livewire\Spot::class)->name('spots.index');
    Route::get('/spots/create', \App\Http\Livewire\Spot\Store::class)->name('spots.create');
    Route::get('/spots/{id}/edit', \App\Http\Livewire\Spot\Update::class)->name('spots.edit');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
