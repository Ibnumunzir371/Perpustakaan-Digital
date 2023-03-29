<?php

use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\CategoryController;
use App\Models\category;
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
    return view('backend.master');
});

// Route category admin
Route::get('/category/index', [CategoryController::class, 'index'])->name("category-index");
Route::get('/category/create', [CategoryController::class, 'create'])->name("category-create");
Route::post('/category/store', [CategoryController::class, 'store'])->name("category-store");
Route::delete('/category/delete/{id}', [categoryController::class, 'destroy'])->name("category-delete");
Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name("category-edit");
Route::put('/category/update/{id}', [CategoryController::class, 'update'])->name("category-update");

// Route book admin
Route::get('/book/index', [BookController::class, 'index'])->name("book-index");
Route::get('/book/create', [BookController::class, 'create'])->name("book-create");
Route::post('/book/store', [BookController::class, 'store'])->name("book-store");
Route::get('/book/edit/{id}', [BookController::class, 'edit'])->name("book-edit");
Route::delete('/book/destroy/{id}', [BookController::class, 'destroy'])->name("book-destroy");