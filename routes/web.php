<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupplierController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/supplier/', SupplierController::class . '@index')->name('supplier.index');
Route::get('/supplier/create', SupplierController::class . '@create')->name('supplier.create');
Route::post('/supplier', SupplierController::class . '@store')->name('supplier.store');
Route::get('/supplier/{id}/edit/', SupplierController::class . '@edit')->name('supplier.edit');
Route::put('/supplier/update/{id}', SupplierController::class . '@update')->name('supplier.update');
Route::delete('/supplier/{id}', SupplierController::class . '@destroy')->name('supplier.destroy');
