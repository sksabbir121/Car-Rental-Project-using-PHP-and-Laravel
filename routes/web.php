<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CarController as AdminCarController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\CarController;




Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::resource('cars', CarController::class);
});

use App\Http\Controllers\Admin\RentalController;

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::resource('rentals', RentalController::class)->only(['index', 'show', 'destroy']);
});

use App\Http\Controllers\Admin\CustomerController;

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::resource('customers', CustomerController::class);
});

use App\Http\Controllers\Admin\DashboardController;

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
});

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');

Route::get('/rentals', [CarController::class, 'index'])->name('rentals');
Route::get('/rentals/{car}', [CarController::class, 'show'])->name('rentals.show');

Route::post('/rentals/{car}/book', [CarController::class, 'book'])->name('rentals.book');

Route::get('/contact', [PageController::class, 'contact'])->name('contact');

Route::post('/contact', [PageController::class, 'sendContact'])->name('contact.send');

Route::get('/cars', [CarController::class, 'index'])->name('cars.index')->middleware('auth');
Route::post('/rentals/book/{id}', [RentalController::class, 'book'])->name('rentals.book')->middleware('auth');





require __DIR__.'/auth.php';
