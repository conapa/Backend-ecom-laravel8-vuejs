<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use Inertia\Inertia;


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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

//user dashboard
Route::get('/dashboard',[HomeController::class,'index'])->name('dashboard');
Route::get('/dashboard/category/{category}',[HomeController::class,'getProductsByCategory'])->name('category.products');
Route::get('/userorders',[OrderController::class,'index'])->name('userorders');

//payments
Route::get('/checkout/{product}',[OrderController::class,'PayNow'])->name('checkout');
Route::get('/checkout/payment_Cancel',[OrderController::class,'payment_Cancel'])->name('cancel.payment');
Route::get('/checkout/payment_success',[OrderController::class,'payment_success'])->name('success.payment');

//admin dashboard
Route::get('/admin',[AdminController::class,'index'])->name('admin');
Route::get('/admin/login',[AdminController::class,'ShowAdminLogin'])->name('showadminLogin');
Route::post('/admin/login',[AdminController::class,'adminLogin'])->name('adminLogin');
Route::get('/admin/logout',[AdminController::class,'adminLogout'])->name('adminLogout');
Route::get('/admin/addproduct',[AdminController::class,'addproduct'])->name('addproduct');
Route::post('/admin/createproduct',[ProductController::class,'store'])->name('createproduct');


Route::get('/deleteorder/{order}',[OrderController::class,'destroy'])->name('delete.order');
Route::get('/updateorder/{order}',[OrderController::class,'update'])->name('update.order');




/*
Route::middleware(['aut/category/h:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');*/
