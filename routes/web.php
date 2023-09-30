<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Category;
use App\Livewire\Category\Store;
use App\Livewire\Category\Update;
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
    Route::get('/categories', Category::class)->name('categories.index');
    Route::get('/categories/create', Store::class)->name('categories.create');
    Route::get('/categories/{id}/edit', Update::class)->name('categories.edit');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
