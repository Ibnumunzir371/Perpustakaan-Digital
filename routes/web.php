<?php

use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LoanController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Landingpage\HomeController as LandingpageHomeController;
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
// Route Landingpage
Route::get('/', [LandingpageHomeController::class, 'index'])->name("landingpage-index");
Route::get('/landingpage/listbook/{id}', [LandingpageHomeController::class, 'listbook'])->name("landingpage-listbook");

Route::get('/login', function () {
    // return view('backend.master');
    return view('auth.login');
});

// Route::get('/', function () {
//     // return view('backend.master');
//     return view('backend.master');
// });



Route::middleware('auth', 'CheckRole:admin')->group(function () {
    // Route category admin
    Route::get('/category/index', [CategoryController::class, 'index'])->name("category-index");
    Route::get('/category/create', [CategoryController::class, 'create'])->name("category-create");
    Route::post('/category/store', [CategoryController::class, 'store'])->name("category-store");
    Route::delete('/category/delete/{id}', [categoryController::class, 'destroy'])->name("category-delete");
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name("category-edit");
    Route::put('/category/update/{id}', [CategoryController::class, 'update'])->name("category-update");
});


Route::middleware('auth', 'CheckRole:admin')->group(function () {
    // Route book admin
    Route::get('/book/index', [BookController::class, 'index'])->name("book-index");
    Route::get('/book/create', [BookController::class, 'create'])->name("book-create");
    Route::post('/book/store', [BookController::class, 'store'])->name("book-store");
    Route::get('/book/edit/{id}', [BookController::class, 'edit'])->name("book-edit");
    Route::delete('/book/destroy/{id}', [BookController::class, 'destroy'])->name("book-destroy");
    Route::put('/book/update/{id}', [BookController::class, 'update'])->name("book-update");
});

Route::middleware('auth', 'CheckRole:admin')->group(function () {
    // Route member admin
    Route::get('/member/index', [MemberController::class, 'index'])->name("member-index");
    Route::get('/member/create', [MemberController::class, 'create'])->name("member-create");
    Route::post('/member/store', [MemberController::class, 'store'])->name("member-store");
    Route::get('/member/edit/{id}', [MemberController::class, 'edit'])->name("member-edit");
    Route::put('/member/update/{id}', [MemberController::class, 'update'])->name("member-update");
    Route::delete('/member/destroy/{id}', [MemberController::class, 'destroy'])->name("member-destroy");
    //Route Loan admin
    Route::get('/loan/index', [LoanController::class, 'index'])->name("loan-index");

    Route::delete('/loan/destroy/{id}', [LoanController::class, 'destroy'])->name("loan-destroy");
    Route::put('/loan/update/{id}', [LoanController::class, 'update'])->name("loan-update");
    Route::get('/loan/create', [LoanController::class, 'create'])->name("loan-create");
    
    Route::post('/store/loan', [LoanController::class, 'store'])->name("loan-store");
    Route::get('/return', [LoanController::class, 'return'])->name("loan-return");
});


Route::middleware('auth', 'CheckRole:admin,user')->group(function () {
    //Route Landingpage
    Route::get('/detail/book/{id}', [LoanController::class, 'detail_loan'])->name("detail-loan");


    //dashboard
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    // Route::get('/dashbord/index', [HomeController::class, 'index'])->name("dashbord");
});

Auth::routes();
