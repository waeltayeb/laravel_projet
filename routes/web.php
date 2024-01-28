<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\payment;
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
    return view('welcome');
});



Route::get('/payment', function () {
    return view('payment');
})->middleware(['auth', 'verified'])->name('payment');


Route::middleware('auth')->group(function () {
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [payment::class, 'readPayments'])->name('dashboard');
    Route::get('/history', [payment::class, 'virefiedPayments'])->name('history');
    Route::post('payment',[payment::class, 'payment']);
});



require __DIR__.'/auth.php';
