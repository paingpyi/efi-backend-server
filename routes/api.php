<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Content\ProductController;
use App\Http\Controllers\Content\BlogController;
use App\Http\Controllers\Content\PageController;
use App\Http\Controllers\Content\NewsController;
use App\Http\Controllers\Content\JobController;
use App\Http\Controllers\Content\CsrController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'products', 'namespace' => 'Content'], function () {
    Route::get('/', [ProductController::class, 'getlist']);

    Route::post('/', [ProductController::class, 'postList']);
});

Route::group(['prefix' => 'blogs', 'namespace' => 'Content'], function () {
    Route::get('/{para?}', [BlogController::class, 'list']);

    Route::post('/', [BlogController::class, 'apiList']);
});

Route::group(['prefix' => 'pages', 'namespace' => 'Content'], function () {
    //Route::get('/{para?}', [BlogController::class, 'list']);

    Route::post('/', [PageController::class, 'postList']);
});

Route::group(['prefix' => 'news', 'namespace' => 'Content'], function () {
    Route::get('/{para?}', [NewsController::class, 'getlist']);

    Route::post('/', [NewsController::class, 'postList']);
});

Route::group(['prefix' => 'career', 'namespace' => 'Content'], function () {
    Route::get('/{para?}', [JobController::class, 'show']);

    Route::post('/', [JobController::class, 'apiList']);
});

Route::group(['prefix' => 'csr', 'namespace' => 'Content'], function () {
    Route::get('/{para?}', [CsrController::class, 'show']);

    Route::post('/', [CsrController::class, 'apiList']);
});
