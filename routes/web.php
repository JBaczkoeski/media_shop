<?php

use App\Http\Controllers\AuthorizationController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProvincesController;
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

//PRODUCTS ADMIN
    Route::get('/admin/produkty',[ProductsController::class, 'index'])->name('products');
    Route::get('/admin/produkty/zarchiwizowane',[ProductsController::class, 'indexArchived'])->name('products.archived');
    Route::get('/admin/produkty/dodaj',[ProductsController::class, 'create'])->name('product.add');
    Route::post('/admin/produkty/dodaj/dodaj',[ProductsController::class, 'store'])->name('product.store');
    Route::get('/admin/produkty/marki',[ProductsController::class, 'showBrands'])->name('brands');
    Route::post('/admin/produkty/marki/dodaj',[ProductsController::class, 'storeBrands'])->name('brands.create');
    Route::get('/admin/produkty/kategorie',[ProductsController::class, 'showCategories'])->name('categories');
    Route::post('/admin/produkty/kategorie/dodaj',[ProductsController::class, 'storeCategories'])->name('categories.create');
    Route::get('/admin/produkty/produkt/edytuj/{id}',[ProductsController::class, 'edit'])->name('product.edit');
    Route::patch('/admin/produkty/produkt/zaktualizuj',[ProductsController::class, 'update'])->name('product.update');
    Route::post('/admin/produkty/zarchiwizuj/{id}',[ProductsController::class, 'archive'])->name('product.archive');
    Route::delete('/admin/produkty/usun/{id}',[ProductsController::class, 'delete'])->name('product.delete');

//PROVINCES ADMIN
    Route::get('/admin/urzytkonicy',[ProvincesController::class, 'index'])->name('provinces');

//EMPLOYEES ADMIN
    Route::get('/admin/pracownicy',[EmployeesController::class, 'index'])->name('employees');
});
