<?php

use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LoanController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Landingpage\HomeController as LandingpageHomeController;
use App\Http\Controllers\Landingpage\ListbookController;
use App\Http\Controllers\LandingpageController;
use App\Models\category;
use Illuminate\Support\Facades\Auth;
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
    // return view('backend.master');
    return view('auth.login');
});


Route::middleware('auth','CheckRole:admin')->group(function () {
    // Route category admin
    Route::get('/category/index', [CategoryController::class, 'index'])->name("category-index");
    Route::get('/category/create', [CategoryController::class, 'create'])->name("category-create");
    Route::post('/category/store', [CategoryController::class, 'store'])->name("category-store");
    Route::delete('/category/delete/{id}', [categoryController::class, 'destroy'])->name("category-delete");
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name("category-edit");
    Route::put('/category/update/{id}', [CategoryController::class, 'update'])->name("category-update");
});


Route::middleware('auth','CheckRole:admin')->group(function () {
    // Route book admin
    Route::get('/book/index', [BookController::class, 'index'])->name("book-index");
    Route::get('/book/create', [BookController::class, 'create'])->name("book-create");
    Route::post('/book/store', [BookController::class, 'store'])->name("book-store");
    Route::get('/book/edit/{id}', [BookController::class, 'edit'])->name("book-edit");
    Route::delete('/book/destroy/{id}', [BookController::class, 'destroy'])->name("book-destroy");
    Route::put('/book/update/{id}', [BookController::class, 'update'])->name("book-update");
});

Route::middleware('auth','CheckRole:admin')->group(function () {
    // Route member admin
    Route::get('/member/index', [MemberController::class, 'index'])->name("member-index");
    // Route::get('/member/edit/{id}', [MemberController::class, 'edit'])->name("member-edit");
    Route::delete('/member/destroy/{id}', [MemberController::class, 'destroy'])->name("member-destroy");

    //Route Loan admin
    Route::get('/loan/index', [LoanController::class, 'index'])->name("loan-index");
});


Route::middleware('auth','CheckRole:admin,user')->group(function () {
    //Route Landingpage
    Route::get('/landingpage/index', [LandingpageHomeController::class, 'index'])->name("landingpage-index");
    Route::get('/landingpage/listbook/{id}', [LandingpageHomeController::class, 'listbook'])->name("landingpage-listbook");
    // Route::get('/pdf/{id}',[LandingpageHomeController::class, 'showpdf'])->name("show-pdf");
    

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/dashbord/index', [HomeController::class, 'index'])->name("dashbord");
});

Auth::routes();
