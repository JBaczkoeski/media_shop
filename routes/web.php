<?php

use App\Http\Controllers\Admin\Employee\EmployeeController;
use App\Http\Controllers\Admin\Product\BrandController;
use App\Http\Controllers\Admin\Product\CategoryController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\Store\StoreController;
use App\Http\Controllers\Admin\User\ProvinceController;
use App\Http\Controllers\Admin\Warechouse\WarehouseController;
use App\Http\Controllers\Auth\AuthorizationController;
use App\Http\Controllers\CartController;
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
    Route::group(['prefix' => 'produkty'], function () {
        Route::get('/', [ProductController::class, 'index'])->name('products');
        Route::get('/zarchiwizowane', [ProductController::class, 'indexArchived'])->name('products.archived');
        Route::get('/dodaj', [ProductController::class, 'create'])->name('product.add');
        Route::post('/dodaj/utworz', [ProductController::class, 'store'])->name('product.store');
        Route::get('/edytuj/{product}', [ProductController::class, 'edit'])->name('product.edit');
        Route::patch('/zaktualizuj/{product}', [ProductController::class, 'update'])->name('product.update');
        Route::post('/zarchiwizuj/{product}', [ProductController::class, 'archive'])->name('product.archive');
        Route::delete('/usun/{product}', [ProductController::class, 'delete'])->name('product.delete');
        Route::get('/wyszukaj', [ProductController::class, 'search']);

        //BRAND ADMIN
        Route::group(['prefix' => 'marki'], function () {
            Route::get('/', [BrandController::class, 'index'])->name('brands');
            Route::post('/dodaj', [BrandController::class, 'store'])->name('brands.create');
        });
        //CATEGORY ADMIN
        Route::group(['prefix' => 'kategorie'], function () {
            Route::get('/', [CategoryController::class, 'index'])->name('categories');
            Route::post('/dodaj', [CategoryController::class, 'store'])->name('categories.create');
        });
    });
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

