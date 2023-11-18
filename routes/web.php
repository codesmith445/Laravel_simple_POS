<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TransactionController;

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

Auth::routes();

//Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('/orders', 'OrderController');
Route::resource('/products', 'ProductController');
Route::resource('/suppliers', 'SupplierController');
Route::resource('/users', 'UserController');
Route::resource('/companies', 'CompanyController');
Route::resource('/transactions', 'TransactionController');
Route::resource('/section', 'SectionController');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::put('/users/update/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/delete/{id}', [UserController::class, 'destroy'])->name('users.destroy');



Route::get('/product/index', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/barcodes/index', [ProductController::class, 'GetProductBarcodes'])->name('products.barcode');
Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
Route::put('/products/{id}/update', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{id}/delete', [ProductController::class, 'destroy'])->name('products.destroy');



Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::post('/orders/store', [OrderController::class, 'store'])->name('orders.store');


Route::get('/sections/index', [SectionController::class, 'index'])->name('sections.index');


Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers.index');
Route::post('/suppliers/store', [SupplierController::class, 'store'])->name('suppliers.store');
Route::put('/suppliers/{id}/update', [SupplierController::class, 'update'])->name('suppliers.update');
Route::delete('/suppliers/{id}/destroy', [SupplierController::class, 'destroy'])->name('suppliers.destroy');

Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
Route::post('/customers/store', [CustomerController::class, 'store'])->name('customers.store');
Route::put('/customers/{id}/update', [CustomerController::class, 'update'])->name('customers.update');
Route::delete('/customers/{id}/destroy', [CustomerController::class, 'destroy'])->name('customers.destroy');