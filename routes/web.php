<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DrugController;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\CategoriesController;

/*
|--------------------------------------------------------------------------
| Web Routes 
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServicePrpovider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin/home', [AdminController::class, 'index'])
    ->name('admin.home');
    // ->middleware('is_admin');

//PENGELOLAAN BUKU
Route::get('admin/drugs', [DrugController::class, 'index'])
    ->name('admin.drugs');
    // ->middleware('is_admin');

Route::post('admin/drugs', [DrugController::class, 'store'])
    ->name('admin.drug.submit');
    // ->middleware('is_admin');

Route::post('admin/drugs', [DrugController::class, 'submit_drug'])
    ->name('admin.drug.submit');
    // ->middleware('is_admin');

//UPDATE BOOK
Route::patch('admin/drugs/update', [DrugController::class, 'update'])
    ->name('admin.drug.update');
    // ->middleware('is_admin');

Route::get('admin/ajaxadmin/dataDrug/{id}', [DrugController::class, 'getDataDrug']);

Route::delete('admin/drugs/delete', [DrugController::class, 'destroy'])
    ->name('admin.drug.delete');
    // ->middleware('is_admin');

//BRANDS
Route::get('admin/merek', [App\Http\Controllers\BrandsController::class, 'index'])
    ->name('admin.merek');
    // ->middleware('is_admin');

//route tambah 
Route::post('admin/merek', [BrandsController::class, 'tambah_brand'])
    ->name('admin.brand.submit');
    // ->middleware('is_admin');

//route edit
Route::patch('admin/merek/update', [BrandsController::class, 'update_brands'])
    ->name('admin.brand.update');
    // ->middleware('is_admin');
Route::get('admin/ajaxadmin/dataBrands/{id}', [BrandsController::class, 'getDataBrands']);

//route delete
Route::delete('admin/merek/delete', [BrandsController::class, 'delete_brands'])
    ->name('admin.brand.delete');
    // ->middleware('is_admin');

// KATEGORI
Route::get('admin/kategori', [CategoriesController::class, 'index'])
    ->name('admin.kategori');
    // ->middleware('is_admin');

// route tambah categories
Route::post('admin/kategori', [CategoriesController::class, 'tambah_categories'])
    ->name('admin.kategori.submit');
    // ->middleware('is_admin');

//route edit categories
Route::patch('admin/kategori/update', [CategoriesController::class, 'update_categories'])
    ->name('admin.kategori.update');
    // ->middleware('is_admin');
Route::get('admin/ajaxadmin/dataCategories/{id}', [CategoriesController::class, 'getDataCategories']);

//route delete categories
Route::delete('admin/kategori/delete', [CategoriesController::class, 'delete_categories'])
    ->name('admin.kategori.delete');
    // ->middleware('is_admin');
