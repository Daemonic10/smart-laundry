<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TransactionController;
use App\Models\Transaction;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', [ServiceController::class, 'adminindex'])->name('admin.index')->middleware(['auth', 'verified']);
Route::put('/admin/{transaction}/update', [TransactionController::class, 'updateStatus'])->name('admin.updatestatus')->middleware(['auth', 'verified']);
Route::post('/transaction/show', [TransactionController::class, 'show'])->name('transaction.show');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('service', ServiceController::class);
Route::resource('transaction', TransactionController::class);

require __DIR__.'/auth.php';
