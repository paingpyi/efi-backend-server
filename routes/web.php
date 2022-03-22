<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\User\TeamController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Content\NewsController;
use App\Http\Controllers\Content\BlogController;
use App\Http\Controllers\Content\ProductController;
use App\Http\Controllers\Content\PageController;
use App\Http\Controllers\Content\JobController;
use App\Http\Controllers\Content\CsrController;
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
    return redirect()->route('login');
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

        Route::get('/unpublished', [BlogController::class, 'unpublished'])->name('unpublished#blog#list');

        Route::get('/drafted', [BlogController::class, 'drafted'])->name('drafted#blog#list');

        Route::get('/new', [BlogController::class, 'create'])->name('new#blog');
        Route::post('/new', [BlogController::class, 'store'])->name('store#data#blog');

        Route::get('/edit/{id}', [BlogController::class, 'edit'])->name('edit#blog');
        Route::post('/edit/{id}', [BlogController::class, 'update'])->name('update#data#blog');

        Route::post('/unpublishing/{id}', [BlogController::class, 'destroy'])->name('unpublishing#blog');

        Route::post('/drafting/{id}', [BlogController::class, 'draft'])->name('drafting#blog');
    });

    Route::group(['prefix' => 'page', 'namespace' => 'Content'], function () {
        Route::get('/', [PageController::class, 'index'])->name('page#list');

        Route::get('/deactivated', [PageController::class, 'deactivated'])->name('deactivated#page#list');

        Route::get('/new', [PageController::class, 'create'])->name('new#page');
        Route::post('/new', [PageController::class, 'store'])->name('store#data#page');

        Route::get('/edit/{id}', [PageController::class, 'edit'])->name('edit#page');
        Route::post('/edit/{id}', [PageController::class, 'update'])->name('update#data#page');

        Route::post('/deactivate/{id}', [PageController::class, 'destroy'])->name('deactivate#page');
    });

    Route::group(['prefix' => 'news', 'namespace' => 'Content'], function () {
        Route::get('/', [NewsController::class, 'index'])->name('news#list');

        Route::get('/unpublished', [NewsController::class, 'unpublished'])->name('unpublished#news#list');

        Route::get('/drafted', [NewsController::class, 'drafted'])->name('drafted#news#list');

        Route::get('/create', [NewsController::class, 'create'])->name('new#news');
        Route::post('/create', [NewsController::class, 'store'])->name('store#data#news');

        Route::get('/edit/{id}', [NewsController::class, 'edit'])->name('edit#news');
        Route::post('/edit/{id}', [NewsController::class, 'update'])->name('update#data#news');

        Route::post('/unpublishing/{id}', [NewsController::class, 'destroy'])->name('unpublishing#news');

        Route::post('/drafting/{id}', [NewsController::class, 'draft'])->name('drafting#news');
    });

    Route::group(['prefix' => 'job', 'namespace' => 'Content'], function () {
        Route::get('/', [JobController::class, 'index'])->name('job#list');

        Route::get('/closed', [JobController::class, 'closed'])->name('closed#job#list');

        Route::get('/new', [JobController::class, 'create'])->name('new#job');
        Route::post('/new', [JobController::class, 'store'])->name('store#data#job');

        Route::get('/edit/{id}', [JobController::class, 'edit'])->name('edit#job');
        Route::post('/edit/{id}', [JobController::class, 'update'])->name('update#data#job');

        Route::post('/close/{id}', [JobController::class, 'destroy'])->name('close#job');
    });

    Route::group(['prefix' => 'csr', 'namespace' => 'Content'], function () {
        Route::get('/', [CsrController::class, 'index'])->name('csr#list');

        Route::get('/unpublished', [CsrController::class, 'unpublished'])->name('unpublished#csr#list');

        Route::get('/drafted', [CsrController::class, 'drafted'])->name('drafted#csr#list');

        Route::get('/new', [CsrController::class, 'create'])->name('new#csr');
        Route::post('/new', [CsrController::class, 'store'])->name('store#data#csr');

        Route::get('/edit/{id}', [CsrController::class, 'edit'])->name('edit#csr');
        Route::post('/edit/{id}', [CsrController::class, 'update'])->name('update#data#csr');

        Route::post('/unpublishing/{id}', [CsrController::class, 'destroy'])->name('unpublishing#csr');

        Route::post('/drafting/{id}', [CsrController::class, 'draft'])->name('drafting#csr');
    });
});
