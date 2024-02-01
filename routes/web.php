<?php

use App\Http\Controllers\AuthorizationController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\WarehouseController;
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

//USER PRODUCTS
Route::get('/produkty', [ProductController::class, 'index'])->name('user.products');
Route::get('/produkty/wyszukaj', [ProductController::class, 'search'])->name('user.products.search');

Route::post('/koszyk/dodaj/{product}', [CartController::class, 'store'])->name('cart.store');
Route::get('/koszyk', [CartController::class, 'index'])->name('cart');

//Admin
Route::group(['middleware' => ['auth', 'role:admin'], 'prefix' => 'admin'], function () {
    Route::get('/', function () {
        return view('admin.home');
    });

    //PRODUCTS ADMIN
    Route::get('/produkty', [ProductController::class, 'index'])->name('products');
    Route::get('/produkty/zarchiwizowane', [ProductController::class, 'indexArchived'])->name('products.archived');
    Route::get('/produkty/dodaj', [ProductController::class, 'create'])->name('product.add');
    Route::post('/produkty/dodaj/dodaj', [ProductController::class, 'store'])->name('product.store');
    Route::get('/produkty/marki', [ProductController::class, 'showBrands'])->name('brands');
    Route::post('/produkty/marki/dodaj', [ProductController::class, 'storeBrands'])->name('brands.create');
    Route::get('/produkty/kategorie', [ProductController::class, 'showCategories'])->name('categories');
    Route::post('/produkty/kategorie/dodaj', [ProductController::class, 'storeCategories'])->name('categories.create');
    Route::get('/produkty/produkt/edytuj/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::patch('/produkty/produkt/zaktualizuj', [ProductController::class, 'update'])->name('product.update');
    Route::post('/produkty/zarchiwizuj/{id}', [ProductController::class, 'archive'])->name('product.archive');
    Route::delete('/produkty/usun/{id}', [ProductController::class, 'delete'])->name('product.delete');
    Route::get('/produkty/wyszukaj', [ProductController::class, 'search']);

    //PROVINCES ADMIN
    Route::get('/uzytkonicy', [ProvinceController::class, 'index'])->name('provinces');
    Route::post('/uzytkonicy/region/dodaj', [ProvinceController::class, 'store'])->name('provinces.store');

    //EMPLOYEES ADMIN
    Route::get('/pracownicy', [EmployeeController::class, 'index'])->name('employees');
    Route::get('/pracownicy/dodawanie', [EmployeeController::class, 'create'])->name('employees.create');
    Route::post('/pracownicy/dodawanie/dodawanie', [EmployeeController::class, 'store'])->name('employees.store');

    //STORES ADMIN
    Route::get('/sklepy', [StoreController::class, 'index'])->name('stores');
    Route::get('/sklep/{id}', [StoreController::class, 'show'])->name('store');
    Route::get('/sklepy/dodawanie', [StoreController::class, 'create'])->name('stores.add');
    Route::post('/sklepy/dodawanie/dodaj', [StoreController::class, 'store'])->name('stores.store');

    //WAREHOUSE ADMIN
    Route::get('/magazyny', [WarehouseController::class, 'index'])->name('warehouses');
    Route::get('/magazyny/{id}', [WarehouseController::class, 'show'])->name('warehouse');
    Route::get('/magazyny/dodawanie', [WarehouseController::class, 'create']);
    Route::post('/magazyny/dodawanie/dodaj', [WarehouseController::class, 'store'])->name('warehouses.store');
});

