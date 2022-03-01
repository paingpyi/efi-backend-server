<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\User\TeamController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Content\BlogController;
use App\Http\Controllers\Content\ProductController;
use App\Http\Controllers\Setting\CategoryController;
use App\Http\Middleware\AdminCheckMiddleware;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
})->name('home');

/*Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');*/

Route::group(['prefix' => 'admin', 'middleware' => AdminCheckMiddleware::class], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin#dashboard');

    Route::group(['prefix' => 'user', 'namespace' => 'User'], function () {
        Route::get('/', [UserController::class, 'index'])->name('user#list');

        Route::get('/deactivated', [UserController::class, 'deactivated'])->name('deactivated#user#list');

        Route::get('/new', [UserController::class, 'create'])->name('new#user');
        Route::post('/new', [UserController::class, 'store'])->name('store#data#user');

        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit#user');
        Route::post('/edit/{id}', [UserController::class, 'update'])->name('update#data#user');

        Route::post('/deactivate/{id}', [UserController::class, 'destroy'])->name('deactivate#user');
    });

    Route::group(['prefix' => 'team', 'namespace' => 'User'], function () {
        Route::get('/', [TeamController::class, 'index'])->name('team#list');

        Route::get('/deactivated', [TeamController::class, 'deactivated'])->name('deactivated#team#list');

        Route::get('/new', [TeamController::class, 'create'])->name('new#team');
        Route::post('/new', [TeamController::class, 'store'])->name('store#data#team');

        Route::get('/edit/{id}', [TeamController::class, 'edit'])->name('edit#team');
        Route::post('/edit/{id}', [TeamController::class, 'update'])->name('update#data#team');

        Route::post('/deactivate/{id}', [TeamController::class, 'destroy'])->name('deactivate#team');
    });

    Route::group(['prefix' => 'category', 'namespace' => 'Setting'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('category#list');

        Route::get('/deactivated', [CategoryController::class, 'deactivated'])->name('deactivated#category#list');

        Route::get('/new', [CategoryController::class,'create'])->name('new#category');
        Route::post('/new', [CategoryController::class,'store'])->name('store#data#category');

        Route::get('/edit/{id}', [CategoryController::class,'edit'])->name('edit#category');
        Route::post('/edit/{id}', [CategoryController::class,'update'])->name('update#data#category');

        Route::post('/deactivate/{id}', [CategoryController::class,'destroy'])->name('deactivate#category');
    });

    Route::group(['prefix' => 'product', 'namespace' => 'Content'], function () {
        Route::get('/', [ProductController::class, 'index'])->name('product#list');

        Route::get('/deactivated', [ProductController::class, 'deactivated'])->name('deactivated#product#list');

        Route::get('/new', [ProductController::class, 'create'])->name('new#product');
        Route::post('/new', [ProductController::class, 'store'])->name('store#data#product');

        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit#product');
        Route::post('/edit/{id}', [ProductController::class, 'update'])->name('update#data#product');

        Route::post('/deactivate/{id}', [ProductController::class, 'destroy'])->name('deactivate#product');
    });

    Route::group(['prefix' => 'blog', 'namespace' => 'Content'], function () {
        Route::get('/', [BlogController::class, 'index'])->name('blog#list');

        /*Route::get('/deactivated', [BlogController::class, 'deactivated'])->name('deactivated#product#list');

        Route::get('/new', [BlogController::class, 'create'])->name('new#product');
        Route::post('/new', [BlogController::class, 'store'])->name('store#data#product');

        Route::get('/edit/{id}', [BlogController::class, 'edit'])->name('edit#product');
        Route::post('/edit/{id}', [BlogController::class, 'update'])->name('update#data#product');

        Route::post('/deactivate/{id}', [BlogController::class, 'destroy'])->name('deactivate#product');*/
    });
});
