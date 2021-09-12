<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\MoneySpend;
use App\Http\Controllers\MoneyBorrowController;
use App\Http\Controllers\MoneyComeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $users=User::all();
    return view('dashboard', compact('users'));
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('/spendmoney/all',[MoneySpend::class,'index'])->name('spendmoney');
    Route::post('/moneyspend/add',[MoneySpend::class,'store'])->name('addmoneyspend');
    Route::get('/moneyspend/edit/{id}', [MoneySpend::class,'edit']);
    Route::post('/moneyspend/update/{id}', [MoneySpend::class,'update']);
    Route::get('/moneyspend/delete/{id}', [MoneySpend::class,'delete']);

    Route::get('/borrowmoney/all',[MoneyBorrowController::class,'index'])->name('moneyborrow');
    Route::post('/borrowspend/add',[MoneyBorrowController::class,'store'])->name('addmoneyborrow');
    Route::get('/moneyborrow/edit/{id}', [MoneyBorrowController::class,'edit']);
    Route::post('/moneyborrow/update/{id}', [MoneyBorrowController::class,'update']);
    Route::get('/moneyborrow/delete/{id}', [MoneyBorrowController::class,'delete']);

    Route::get('/moneycome/all',[MoneyComeController::class,'index'])->name('moneycome');
    Route::post('/moneycome/add',[MoneyComeController::class,'store'])->name('addmoneycome');
    Route::get('/moneycome/edit/{id}', [MoneyComeController::class,'edit']);
    Route::post('/moneycome/update/{id}', [MoneyComeController::class,'update']);
    Route::get('/moneycome/delete/{id}', [MoneyComeController::class,'delete']);
    

});
