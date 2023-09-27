<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;   
use App\Http\Controllers\VerificationController;   
use App\Http\Controllers\UserVerificationController; 
use App\Http\Controllers\ProductController;           
            

Route::get('/', function () {return redirect('/dashboard');})->middleware('auth');

// Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
// Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');


	Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
	Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
	Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
	Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
	Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
	Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
	Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');
    Route::group(['middleware' => 'auth'], function () {
		
	Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.perform');
Route::get('/users', [RegisterController::class, 'index'])->name('users');
Route::get('/user-edit/{id}', [RegisterController::class, 'edit'])->name('user-edit');
Route::put('/user-update/{id}', [RegisterController::class, 'update'])->name('user-update');
Route::get('/user-delete/{id}', [RegisterController::class, 'delete'])->name('user-delete');


Route::get('/user-verification', [UserVerificationController::class, 'index'])->name('user-verification');
Route::get('/add-user', [UserVerificationController::class, 'creat'])->name('add-user');
Route::get('/verification-edit/{id}', [UserVerificationController::class, 'edit'])->name('verification-edit');
Route::get('/verification-delete/{id}', [UserVerificationController::class, 'delete'])->name('verification-delete');
Route::get('/invoices-print/{id}', [UserVerificationController::class, 'printInvoice'])->name('invoices-print');
Route::put('/user-verification-update/{id}', [UserVerificationController::class, 'update'])->name('user-verification-update');
Route::post('/user-verification', [UserVerificationController::class, 'store'])->name('/user-verification');

// Route::get('/product', [ProductController::class, 'getAllProducts'])->name('product');
Route::get('/creat-product', [ProductController::class, 'getAllProducts'])->name('creat-product');
Route::post('/creat-product', [ProductController::class, 'store'])->name('creat-product');
Route::get('/delete-product/{id}', [ProductController::class, 'deleteProduct'])->name('delete-product');
// Route::get('/delete-product/{product}', [ProductController::class, 'deleteProducts'])->name('delete-product');




	// routes/web.php
	Route::get('/virtual-reality', [PageController::class, 'vr'])->name('virtual-reality');
	Route::get('/rtl', [PageController::class, 'rtl'])->name('rtl');
	Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');

	
	Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
	Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static'); 
	Route::get('/sign-in-static', [PageController::class, 'signin'])->name('sign-in-static');
	Route::get('/sign-up-static', [PageController::class, 'signup'])->name('sign-up-static'); 
	Route::get('/{page}', [PageController::class, 'index'])->name('page');
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');
	

	
	
	
	
});


