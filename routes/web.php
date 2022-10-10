<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EcomController;
use App\Http\Controllers\MailController;

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

Route::get('/', [EcomController::class, 'home'])->name('home');

Route::get('/home', [EcomController::class, 'home'])->name('home');

Route::get('/product/{id}/details', [EcomController::class, 'getDetails'])->name('product.details');

Route::get('/checkout', [EcomController::class, 'getCheckout'])->name('checkout');

Route::get('/login', [UserController::class, 'login'])->name('login');

Route::get('/register', [UserController::class, 'register'])->name('register');

Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/help', function(){
    return view('helper-users');
})->name('helper.users');

Route::get('/contact-us', function(){
    return view('contact-us');
})->name('contact.us');

Route::get('/about-us', function(){
    return view('about-us');
})->name('about.us');

//Routes concerning User

Route::get('/user-profile', [UserController::class, 'getUser'])->name('user-profile')->middleware(['verified']);

Route::post('/user/{id}/activate', [UserController::class, 'activate'])->middleware(['verified']);

Route::post('/user/{user_id}/budget/{budget_id}/claims', [UserController::class, 'claims'])->middleware(['verified']);

Route::post('/user/{id}/withdraw', [UserController::class, 'withdraw'])->middleware(['verified']);

Route::post('/user/{id}/update/profile', [UserController::class, 'updateProfile'])->name('user.update.profile')->middleware(['verified']);

Route::get('/user/{id}/clear/notifications', [UserController::class, 'clearNotifications'])->name('user.clear.notifications');

Route::get('/user/notification/{id}/details/', [UserController::class, 'getNotificationDetails'])->name('user.notification.details')->middleware(['admin']);

//Routes concerning static User

Route::get('/user-details', [UserController::class, 'getDetails'])->name('user-details')->middleware(['verified']);

Route::get('/user-sponsored', [UserController::class, 'getSponsored'])->name('user-sponsored')->middleware(['verified']);

Route::get('/user-purchases', [EcomController::class, 'getPurchases'])->name('user-purchases')->middleware(['verified']);

Route::get('/user-update-profile', [UserController::class, 'updateProfil'])->name('user-update-profile')->middleware(['verified']);

//Routes concerning Cart
Route::get('pay', [EcomController::class, 'pay'])->name('pay');
Route::get('cart', [EcomController::class, 'cartList'])->name('cart.list');
Route::post('cart', [EcomController::class, 'addToCart'])->name('cart.store');


//Routes concerning Admin

Route::get('/admin', [AdminController::class, 'show'])->name('admin')->middleware(['admin']);

Route::get('/admin/users', [AdminController::class, 'getUsers'])->name('admin.users')->middleware(['admin']);

Route::get('/admin/fournisseurs', [AdminController::class, 'getFurnishers'])->name('admin.fournisseurs')->middleware(['admin']);

Route::get('/admin/create/product', [AdminController::class, 'getCreateProduct'])->name('admin.create.product')->middleware(['admin']);

Route::get('/admin/products', [AdminController::class, 'getProducts'])->name('admin.products')->middleware(['admin']);

Route::post('/admin/create/furnisher', [AdminController::class, 'createFurnisher'])->name('admin.create.furnisher')->middleware(['admin']);

Route::post('/admin/create/product', [AdminController::class, 'createProduct'])->name('admin.create.product')->middleware(['admin']);

Route::get('/admin/inventory', [AdminController::class, 'getInventory'])->name('admin.inventory')->middleware(['admin']);

Route::get('/admin/cart', [AdminController::class, 'getCart'])->name('admin.cart')->middleware(['admin']);

Route::get('/admin/invoices', [AdminController::class, 'getInvoices'])->name('admin.invoices')->middleware(['admin']);

Route::get('/admin/product/{id}/add/cart', [AdminController::class, 'addCart'])->name('admin.add.cart')->middleware(['admin']);

Route::get('/admin/cart/{id}/delete', [AdminController::class, 'deleteCart'])->name('admin.cart.delete')->middleware(['admin']);

Route::get('/admin/create/invoice', [AdminController::class, 'createInvoice'])->name('admin.create.invoice')->middleware(['admin']);

Route::get('/admin/invoice/{id}', [AdminController::class, 'getInvoice'])->name('admin.invoice')->middleware(['admin']);

Route::get('/admin/export/invoice/{id}', [AdminController::class, 'exportInvoice'])->name('admin.export.invoice')->middleware(['admin']);

Route::get('/admin/product/{id}/delete', [AdminController::class, 'deleteProduct'])->name('admin.product.delete')->middleware(['admin']);

Route::get('/admin/edit/product/{id}', [AdminController::class, 'getEditProduct'])->name('admin.edit.product')->middleware(['admin']);

Route::post('/admin/product/{id}/edit', [AdminController::class, 'editProduct'])->name('admin.product.edit')->middleware(['admin']);

Route::get('/admin/user/{id}/details/', [AdminController::class, 'getUserDetails'])->name('admin.user.details')->middleware(['admin']);

