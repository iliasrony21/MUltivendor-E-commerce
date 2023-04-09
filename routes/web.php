<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ApitestController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubcategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Vendor\VendorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;


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

// Route::get('/apitest', [ApitestController::class, 'index']);
// Route::post('/apitest/store', [ApitestController::class, 'store']);

Route::get('/', [FrontendController::class, 'home']);
// Route::get('/', function () {
//     return view('welcome');
// });
// for before admin login
Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::get('admin/register', [AdminController::class, 'register'])->name('admin.register');

// for after admin login
Route::middleware('auth','role:admin')->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::get('admin/changepassword', [AdminController::class, 'changepassword'])->name('admin.changepassword');
    Route::post('admin/updatepassword', [AdminController::class, 'updatepassword'])->name('admin.updatepassword');
    Route::group(['prefix'=> '/admin/category'],function(){
        Route::get('/add', [CategoryController::class, 'index'])->name('add.category');
        Route::post('/store', [CategoryController::class, 'store'])->name('store.category');
        Route::get('/show', [CategoryController::class, 'show'])->name('show.category');
    });
    Route::group(['prefix'=> '/admin/subcategory'],function(){
        Route::get('/add', [SubcategoryController::class, 'index'])->name('add.subcategory');
        Route::post('/store', [SubcategoryController::class, 'store'])->name('store.subcategory');
        Route::get('/show', [SubcategoryController::class, 'show'])->name('show.subcategory');
    });
    Route::group(['prefix'=> '/admin/brand'],function(){
        Route::get('/add', [BrandController::class, 'index'])->name('add.brand');
        Route::post('/store', [BrandController::class, 'store'])->name('store.brand');
        Route::get('/show', [BrandController::class, 'show'])->name('show.brand');
    });
    Route::group(['prefix'=> '/admin/product'],function(){
        Route::get('/add', [ProductController::class, 'index'])->name('add.product');
        Route::post('/store', [ProductController::class, 'store'])->name('store.product');
        Route::get('/show', [ProductController::class, 'show'])->name('show.product');
    });
});

// for before vendor login
Route::get('vendor/login', [VendorController::class, 'login'])->name('vendor.login');
// for after vendor login
Route::middleware('auth','role:vendor')->group(function () {
    Route::get('vendor/dashboard', [VendorController::class, 'index'])->name('vendor.dashboard');

});

Route::middleware('auth')->group(function () {
    Route::get('/addtocart/{id}', [FrontendController::class, 'addtocart'])->name('addtocart');
    Route::get('/addtocartshow', [FrontendController::class, 'addtocartshow'])->name('addtocartshow');
    Route::get('/removeitem/{id}', [FrontendController::class, 'removeitem'])->name('removeitem');
    Route::get('/viewcart', [FrontendController::class, 'viewcart'])->name('viewcart');

});


Route::get('/dashboard',[FrontendController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
