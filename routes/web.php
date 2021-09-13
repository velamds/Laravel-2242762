<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::get('/products', [ProductController::class , "show"]);
Route::get('/product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
Route::get('/product/form/{id?}',[ProductController::class, 'form'])->name('product.form');
Route::post('/product/save', [ProductController::class, 'save'])->name('product.save');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/brands', [BrandController::class , "show"]);
Route::get('/brand/delete/{id}', [BrandController::class, 'delete'])->name('brand.delete');
Route::get('/brand/form/{id?}',[BrandController::class, 'form'])->name('brand.form');
Route::post('/brand/save', [BrandController::class, 'save'])->name('brand.save');

Route::get('/invoice/{id}', function($id){
    $invoice = App\Models\Invoice::findOrFail($id);
    return dd($invoice->products);
});

Route::get('/invoice_detail/{inv}/{prod}', function($inv,$prod){
    $detail = App\Models\InvoiceDetail::where('invoice_id','=',$inv)
                                        ->where('product_id','=',$prod)
                                        ->first();
    return dd($detail);
});