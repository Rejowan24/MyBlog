<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\PostController;
// use App\Http\Controllers\TestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages.index');
});

Route::view('/admin','admin.admin-master');

// for user
Auth::routes();
Route::post('/user/logout', [LoginController::class, 'userLogout'])->name('user.logout');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::resource('/test', TestController::class);


// for admin
Route::group(['prefix' => 'admin'], function(){
    Route::group(['middleware' => 'admin.guest'], function(){
        Route::view('/login','admin.login')->name('admin.login');
        Route::post('/login', [AdminController::class, 'authenticate'])->name('admin.auth');
    });

    Route::group(['middleware' => 'admin.auth'], function(){
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
        
        // admin category page
        // Route::get('/category',[CategoryController::class, 'index'])->name('list.category');
        // Route::get('/category/create', [CategoryController::class, 'create'])->name('create.category');
        // Route::post('/category/store', [CategoryController::class, 'store'])->name('store.category');
        // Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('edit.category');
        // Route::get('/category/delete', [CategoryController::class, 'destroy'])->name('delete.category');
        
        // admin category page.
        Route::resource('/category', CategoryController::class);
        
        // admin tag page.
        Route::resource('/tag', TagController::class);

        // admin post page.
        Route::resource('/post', PostController::class);
    });

});


