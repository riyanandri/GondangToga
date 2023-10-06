<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
})->name('home');

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

    // contents
    Route::get('/contents', \App\Http\Livewire\Article::class)->name('contents.index');
    Route::get('/contents/create', \App\Http\Livewire\Article\Store::class)->name('contents.create');
    Route::get('/contents/{id}/edit', \App\Http\Livewire\Article\Update::class)->name('contents.edit');

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
