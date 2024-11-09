<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoanDetailsController;
use Illuminate\Support\Facades\Route;

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
    Route::get('/loans', [LoanDetailsController::class, 'showLoanDetails'])->name('loan.index');

    Route::get('/loans-process', [LoanDetailsController::class, 'process'])->name('process');
    Route::post('/loans-process-emi', [LoanDetailsController::class, 'processLoanEmi'])->name('loans.process-emi');

});

require __DIR__.'/auth.php';
