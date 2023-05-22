<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\CategoriesController;
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

Route::resource('products', ProductsController::class);

// CART
// Route::get('/', [ProductController::class, 'index']); 
Route::get('cart', [ProductsController::class, 'cart'])->name('cart');
Route::post('add-to-cart/{id}', [ProductsController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [ProductsController::class, 'updateCart'])->name('update.cart');
Route::delete('remove-from-cart', [ProductsController::class, 'removeCart'])->name('remove.cart');

// PRICE 
Route::get('/search', [ProductsController::class,'search'])->name('search');
Route::get('/searchByPrice', [ProductsController::class,'searchByPrice'])->name('searchByPrice');
Route::get('send-mail',[MailController::class,'index'])->name('email');
// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [ProductsController::class, 'dashboard'])->name('dashboard');
Route::get('/products/export/', [ProductsController::class, 'export'])->name('products.export');
Route::get('generate-pdf', [PDFController::class, 'generatePDF'])->name('generate');

Route::middleware(['auth', 'verified', 'admin'])->group(function () {

    

    Route::resource('products', ProductsController::class);
    Route::get('/products', [ProductsController::class, 'index'])->name('products.index');
    Route::post('/products', [ProductsController::class, 'store'])->name('products.store');
    Route::delete('/products/{id}', [ProductsController::class , 'destroy'])->name('products.destroy');
    Route::get('/products/edit/{product}', [ProductsController::class , 'edit'])->name('products.edit');
    Route::put('/products/edit/{product}', [ProductsController::class , 'update'])->name('products.update');

    Route::get('/categories', [CategoriesController::class, 'index'])->name('categories');
    Route::get('/categories/create', [CategoriesController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoriesController::class, 'store'])->name('categories.store');
    Route::delete('/categories/{id}', [CategoriesController::class , 'destroy'])->name('categories.destroy');
    Route::get('/categories/edit/{category}', [CategoriesController::class , 'edit'])->name('categories.edit');
    Route::put('/categories/edit/{category}', [CategoriesController::class , 'update'])->name('categories.update');
});





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';