<?php

use App\Http\Controllers\{EastMeetsWestController,ProfileController};
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(EastMeetsWestController::class)->as('auction.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('save', 'save')->name('save');
    Route::get('delete/{auctionValue}', 'delete')->name('delete');
    Route::get('manager', 'manager')->name('manager');
});

require __DIR__ . '/auth.php';
