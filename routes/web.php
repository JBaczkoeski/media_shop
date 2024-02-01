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
Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/admin', function () {
        return view('admin.home');
    });

//PRODUCTS ADMIN
    Route::get('/admin/produkty', [ProductController::class, 'index'])->name('products');
    Route::get('/admin/produkty/zarchiwizowane', [ProductController::class, 'indexArchived'])->name('products.archived');
    Route::get('/admin/produkty/dodaj', [ProductController::class, 'create'])->name('product.add');
    Route::post('/admin/produkty/dodaj/dodaj', [ProductController::class, 'store'])->name('product.store');
    Route::get('/admin/produkty/marki', [ProductController::class, 'showBrands'])->name('brands');
    Route::post('/admin/produkty/marki/dodaj', [ProductController::class, 'storeBrands'])->name('brands.create');
    Route::get('/admin/produkty/kategorie', [ProductController::class, 'showCategories'])->name('categories');
    Route::post('/admin/produkty/kategorie/dodaj', [ProductController::class, 'storeCategories'])->name('categories.create');
    Route::get('/admin/produkty/produkt/edytuj/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::patch('/admin/produkty/produkt/zaktualizuj', [ProductController::class, 'update'])->name('product.update');
    Route::post('/admin/produkty/zarchiwizuj/{id}', [ProductController::class, 'archive'])->name('product.archive');
    Route::delete('/admin/produkty/usun/{id}', [ProductController::class, 'delete'])->name('product.delete');
    Route::get('/admin/produkty/wyszukaj', [ProductController::class, 'search']);


//PROVINCES ADMIN
    Route::get('/admin/uzytkonicy', [ProvinceController::class, 'index'])->name('provinces');
    Route::post('/admin/uzytkonicy/region/dodaj', [ProvinceController::class, 'store'])->name('provinces.store');

//EMPLOYEES ADMIN
    Route::get('/admin/pracownicy', [EmployeeController::class, 'index'])->name('employees');
    Route::get('/admin/pracownicy/dodawanie', [EmployeeController::class, 'create'])->name('employees.create');
    Route::post('/admin/pracownicy/dodawanie/dodawanie', [EmployeeController::class, 'store'])->name('employees.store');

//STORES ADMIN
    route::get('/admin/sklepy', [StoreController::class, 'index'])->name('stores');
    route::get('/admin/sklep/{id}', [StoreController::class, 'show'])->name('store');
    route::get('/admin/sklepy/dodawanie', [StoreController::class, 'create'])->name('stores.add');
    route::post('/admin/sklepy/dodawanie/dodaj', [StoreController::class, 'store'])->name('stores.store');

//WAREHOUSE ADMIN
    route::get('/admin/magazyny', [WarehouseController::class, 'index'])->name('warehouses');
    route::get('/admin/magazyny/{id}', [WarehouseController::class, 'show'])->name('warehouse');
    route::get('/admin/magazyny/dodawanie', [WarehouseController::class, 'create']);
    route::post('/admin/magazyny/dodawanie/dodaj', [WarehouseController::class, 'store'])->name('warehouses.store');
});
