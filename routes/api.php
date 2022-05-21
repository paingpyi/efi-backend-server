<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Content\ProductController;
use App\Http\Controllers\Content\BlogController;
use App\Http\Controllers\Content\PageController;
use App\Http\Controllers\Content\NewsController;
use App\Http\Controllers\Content\JobController;
use App\Http\Controllers\Content\CsrController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\Setting\BlockController;
use App\Http\Controllers\Setting\CategoryController;
use App\Http\Resources\PageCollection;
use App\Models\Page;

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

    Route::post('/detail', [ProductController::class, 'postDetail']);

    Route::post('/claim/{folder}/{claim_machine_name}', [ProductController::class, 'claim']);
});

Route::group(['prefix' => 'blogs', 'namespace' => 'Content'], function () {
    Route::get('/{para?}', [BlogController::class, 'getList']);

    Route::post('/', [BlogController::class, 'postList']);

    Route::post('/detail', [BlogController::class, 'postDetail']);
});

Route::group(['prefix' => 'pages', 'namespace' => 'Content'], function () {
    //Route::get('/{para?}', [BlogController::class, 'list']);

    //Route::post('/', [PageController::class, 'postList']);

    Route::post('/home', function () {
        return new PageCollection(Page::all());
    });
});

Route::group(['prefix' => 'blocks', 'namespace' => 'setting'], function () {
    Route::post('/slider', [BlockController::class, 'sliderAPI']);
});

Route::group(['prefix' => 'contact', 'namespace' => 'setting'], function () {
    Route::post('/', [BlockController::class, 'contactAPI']);
});

Route::group(['prefix' => 'career', 'namespace' => 'Content'], function () {
    //Route::get('/{para?}', [JobController::class, 'getlist']);

    Route::post('/', [JobController::class, 'postList']);

    Route::post('/detail', [JobController::class, 'postDetail']);

    Route::post('/apply', [JobController::class, 'applyJob']);
});

Route::group(['prefix' => 'csr', 'namespace' => 'Content'], function () {
    Route::get('/{para?}', [CsrController::class, 'getList']);

    Route::post('/', [CsrController::class, 'postList']);
});

Route::group(['prefix' => 'quotes'], function () {
    Route::post('direct-apply', [QuoteController::class, 'directApplication']);

    Route::group(['prefix' => 'premium'], function () {
        Route::post('types', [QuoteController::class, 'getPremiumType']);
    });

    Route::group(['prefix' => 'travel'], function () {
        Route::post('durations', [QuoteController::class, 'getTravelDuration']);

        Route::post('types', [QuoteController::class, 'getTravelType']);
    });

    Route::group(['prefix' => 'general'], function () {
        Route::post('comprehensive-motor-insurance', [QuoteController::class, 'calculateMotor']);
    });

    Route::group(['prefix' => 'life'], function () {
        Route::post('short-term-endowment-insurance', [QuoteController::class, 'calculateShortTermEndowment']);

        Route::post('student-life-insurance', [QuoteController::class, 'calculateStudentLife']);

        Route::post('travel-insurance', [QuoteController::class, 'calculateTravelInsurance']);

        Route::post('snake-bite-life-insurance', [QuoteController::class, 'calculateSnakeInsurance']);

        Route::post('educational-life-insurance', [QuoteController::class, 'calculateEducationInsurance']);

        Route::post('public-terms-life-insurnace', [QuoteController::class, 'calculatePublicTerm']);

        Route::post('personal-accident-life-insurance', [QuoteController::class, 'calculatePersonalAccident']);

        Route::post('group-life-insurance', [QuoteController::class, 'calculateGroupLife']);

        Route::post('farmer-insurance', [QuoteController::class, 'calculateFarmerLife']);

        Route::post('critical-illness-insurance', [QuoteController::class, 'calculateCriticalIllness']);
    });
});

Route::group(['prefix' => 'categories'], function () {
    Route::post('{id?}', [CategoryController::class, 'postList']);
});
