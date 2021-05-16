<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PaiementController;


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
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();
Route::resource('/client',ClientsController::class)->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/invoice',[InvoicesController::class,'test'])->name('invoice');

//Route::get('/facture',[InvoicesController::class,'index'])->name('facture');

Route::resource('/paiement',PaiementController::class);


Route::get('/invoice', [InvoiceController::class,'index'])->name('invoice.index');
Route::get('/invoice/create', [InvoiceController::class,'create'])->name('invoice.create');
Route::post('/invoice/create', [InvoiceController::class,'store'])->name('invoice.store');
Route::get('/invoice/show/{id}', [InvoiceController::class,'show'])->name('invoice.show');
Route::delete('/invoice/{id}',[InvoiceController::class,'destroy'])->name('invoice.destroy');
Route::get('/invoice/{id}', [InvoiceController::class,'pdf'])->name('invoice.pdf');
Route::get('/invoice/dowload/{id}', [InvoiceController::class,'pdfDowload'])->name('invoice.telecharger');

