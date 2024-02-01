<?php

use App\Http\Controllers\AuthorizationController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProvincesController;
use App\Http\Controllers\StoresController;
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
Route::get('/produkty', [ProductsController::class, 'index'])->name('user.products');
Route::get('/produkty/wyszukaj', [ProductsController::class, 'search'])->name('user.products.search');

Route::post('/koszyk/dodaj/{product}', [CartController::class, 'store'])->name('cart.store');
Route::get('/koszyk', [CartController::class, 'index'])->name('cart');

//Admin
Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/admin', function () {
        return view('admin.home');
    });

//PRODUCTS ADMIN
    Route::get('/admin/produkty', [ProductsController::class, 'index'])->name('products');
    Route::get('/admin/produkty/zarchiwizowane', [ProductsController::class, 'indexArchived'])->name('products.archived');
    Route::get('/admin/produkty/dodaj', [ProductsController::class, 'create'])->name('product.add');
    Route::post('/admin/produkty/dodaj/dodaj', [ProductsController::class, 'store'])->name('product.store');
    Route::get('/admin/produkty/marki', [ProductsController::class, 'showBrands'])->name('brands');
    Route::post('/admin/produkty/marki/dodaj', [ProductsController::class, 'storeBrands'])->name('brands.create');
    Route::get('/admin/produkty/kategorie', [ProductsController::class, 'showCategories'])->name('categories');
    Route::post('/admin/produkty/kategorie/dodaj', [ProductsController::class, 'storeCategories'])->name('categories.create');
    Route::get('/admin/produkty/produkt/edytuj/{id}', [ProductsController::class, 'edit'])->name('product.edit');
    Route::patch('/admin/produkty/produkt/zaktualizuj', [ProductsController::class, 'update'])->name('product.update');
    Route::post('/admin/produkty/zarchiwizuj/{id}', [ProductsController::class, 'archive'])->name('product.archive');
    Route::delete('/admin/produkty/usun/{id}', [ProductsController::class, 'delete'])->name('product.delete');
    Route::get('/admin/produkty/wyszukaj', [ProductsController::class, 'search']);


//PROVINCES ADMIN
    Route::get('/admin/uzytkonicy', [ProvincesController::class, 'index'])->name('provinces');
    Route::post('/admin/uzytkonicy/region/dodaj', [ProvincesController::class, 'store'])->name('provinces.store');

//EMPLOYEES ADMIN
    Route::get('/admin/pracownicy', [EmployeesController::class, 'index'])->name('employees');
    Route::get('/admin/pracownicy/dodawanie', [EmployeesController::class, 'create'])->name('employees.create');
    Route::post('/admin/pracownicy/dodawanie/dodawanie', [EmployeesController::class, 'store'])->name('employees.store');

//STORES ADMIN
    route::get('/admin/sklepy', [StoresController::class, 'index'])->name('stores');
    route::get('/admin/sklep/{id}', [StoresController::class, 'show'])->name('store');
    route::get('/admin/sklepy/dodawanie', [StoresController::class, 'create'])->name('stores.add');
    route::post('/admin/sklepy/dodawanie/dodaj', [StoresController::class, 'store'])->name('stores.store');

//WAREHOUSE ADMIN
    route::get('/admin/magazyny', [WarehouseController::class, 'index'])->name('warehouses');
    route::get('/admin/magazyny/{id}', [WarehouseController::class, 'show'])->name('warehouse');
    route::get('/admin/magazyny/dodawanie', [WarehouseController::class, 'create']);
    route::post('/admin/magazyny/dodawanie/dodaj', [WarehouseController::class, 'store'])->name('warehouses.store');
});
