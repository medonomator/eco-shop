<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\NotesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ShoppingCart;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PerosonalPageController;
use App\Http\Controllers\FeedbacksProductController;

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

Route::get('/product/{id}', [ProductController::class, 'show'])->name('productById');
Route::get('/category/{categoryId}', [CategoryController::class, 'show'])->name('categoryById');

Route::get('/articles', function () {
    return view('articles');
});

Route::get('/greenway', function () {
    return view('greenway');
});

Route::get('/contacts', function () {
    return view('contacts');
})->name('contacts');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/shopping-cart', [ShoppingCart::class, 'getProductsForShoppingCart'])->name('shopping-cart');
    Route::get('/add-shopping-cart/{goodId}/{quantity}', [ShoppingCart::class, 'addShoppingCart']);    
    Route::get('/delete-item-shopping-cart/{goodId}', [ShoppingCart::class, 'deleteItem'])->name('delete-item-shopping-cart');    
    Route::get('/clear-shopping-cart', [ShoppingCart::class, 'clearShoppingCart'])->name('clear-shopping-cart');    
    Route::post('/place-order', [ShoppingCart::class, 'placeOrder'])->name('place-order');    
    Route::get('/return-page', [ShoppingCart::class, 'returnPage']); 
    Route::get('/personal', [PerosonalPageController::class, 'index'])->name('personal');
    Route::get('/personal/orders', [PerosonalPageController::class, 'showOrders'])->name('personal-orders');
    Route::post('/personal/change', [PerosonalPageController::class, 'personalChange'])->name('personal-change');
    Route::post('/send-review', [FeedbacksProductController::class, 'store'])->name('send-review');
    Route::get('/delete-feedback/{clientId}/{feedbackId}', [FeedbacksProductController::class, 'destroy'])->name('delete-feedback');
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
    if (Auth::guard('admin')->check()) {
        return view('admin.index');
    }
    return view('auth.admin-login');
})->name('admin-login');

Route::post('/admin-login', [AdminController::class, 'authenticate']);
Route::get('/admin-logout', [AdminController::class, 'adminLogout'])->name('admin-logout');


Route::get('/admin', [AdminController::class, 'index'])->name('admin');

Route::group(['middleware' => ['auth']], function () {
    Route::prefix('admin')->group(function () {
        Route::get('/notes', [NotesController::class, 'index'])->name('get-notes');
        Route::get('/notes/create', function () {
            return view('admin.notes-create')->name('get-notes-create');
        });
    
        Route::post('/notes/create', [NotesController::class, 'store'])->name('post-notes-create');
        Route::get('/notes/delete/{id}', [NotesController::class, 'destroy'])->name('delete-notes');
        Route::put('/notes/update', [NotesController::class, 'update'])->name('update-notes');
    });
});

Route::get('/admin/{any}', [AdminController::class, 'index']);
