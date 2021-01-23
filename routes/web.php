<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\NotesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ShoppingCart;
use App\Http\Controllers\CategoryController;

// Artisan::call('migrate');
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

Route::get('/', [ProductController::class, 'index'])->name('home');

Route::get('/product/{id}', [ProductController::class, 'show']);
Route::get('/category/{categoryId}', [CategoryController::class, 'show']);

Route::get('/articles', function () {
    return view('articles');
});

Route::get('/greenway', function () {
    return view('greenway');
});

Route::get('/contacts', function () {
    return view('contacts');
});

Route::get('/personal', function () {
    return view('personal');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/shopping-cart', [ShoppingCart::class, 'getProductsForShoppingCart'])->name('shopping-cart');
    Route::get('/add-shopping-cart/{goodId}/{quantity}', [ShoppingCart::class, 'addShoppingCart']);    
    Route::get('/delete-item-shopping-cart/{goodId}', [ShoppingCart::class, 'deleteItem']);    
    Route::get('/clear-shopping-cart', [ShoppingCart::class, 'clearShoppingCart']);    
    Route::post('/place-order', [ShoppingCart::class, 'placeOrder']);    
    Route::get('/return-page', [ShoppingCart::class, 'returnPage']);    
});

Route::get('/login', function () {
    if (!auth()->user()) {
        return view('auth.login');
    }
    return redirect()->route('home'); 
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/register', [LoginController::class, 'clientRegister']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/admin-login', function () {
    return view('auth.admin-login');
})->name('admin-login');

Route::post('/admin-login', [LoginController::class, 'adminAuthenticate']);
Route::get('/admin-logout', [LoginController::class, 'adminLogout'])->name('admin-logout');


Route::get('/admin', [AdminController::class, 'index']);

Route::group(['middleware' => ['auth']], function () {
    Route::prefix('admin')->group(function () {
        Route::get('/notes', [NotesController::class, 'index']);
        Route::get('/notes/create', function () {
            return view('admin.notes-create');
        });
    
        Route::post('/notes/create', [NotesController::class, 'store']);
        Route::get('/notes/delete/{id}', [NotesController::class, 'destroy']);
        Route::put('/notes/update', [NotesController::class, 'update']);
    });
});

Route::get('/admin/{any}', [AdminController::class, 'index']);
