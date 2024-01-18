<?php

use App\Http\Controllers\AuthorizationController;
use App\Http\Controllers\ProductsController;
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

Route::get('/', function () {
    return view('home');
});

Route::get('/logowanie', function () {
    return view('login');
});

Route::get('/rejestracja', function () {
    return view('register');
});

Route::post('/zarejestruj', [AuthorizationController::class, 'register'])->name('register');
Route::post('/zaloguj', [AuthorizationController::class, 'login'])->name('login');
Route::post('/wyloguj', [AuthorizationController::class, 'logout'])->name('logout');

Route::get('/produkty', function () {return view('user.products');})->name('products');

//Admin
Route::group(['middleware' => ['auth', 'role:admin']], function() {
    Route::get('/admin', function(){
        return view('admin.home');
    });
    Route::get('/admin/produkty', function(){
        return view('admin.products');
    });

    Route::get('/admin/produkty/dodaj',[ProductsController::class, 'create'])->name('product.add');
    Route::post('/admin/produkty/dodaj/dodaj',[ProductsController::class, 'store'])->name('product.store');
    Route::get('/admin/produkty/marki',[ProductsController::class, 'showBrands'])->name('brands');
    Route::post('/admin/produkty/marki/dodaj',[ProductsController::class, 'storeBrands'])->name('brands.create');
    Route::get('/admin/produkty/kategorie',[ProductsController::class, 'showCategories'])->name('categories');
    Route::post('/admin/produkty/kategorie/dodaj',[ProductsController::class, 'storeCategories'])->name('categories.create');
});
