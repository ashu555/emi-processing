<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoanDetailsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    
    Route::get('/loans', [LoanDetailsController::class, 'showLoanDetails'])->name('loan.index');

    Route::get('/loans-process', [LoanDetailsController::class, 'process'])->name('process');
    Route::post('/loans-process-emi', [LoanDetailsController::class, 'processLoanEmi'])->name('loans.process-emi');

});

require __DIR__.'/auth.php';
