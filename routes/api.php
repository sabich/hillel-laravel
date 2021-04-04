<?php

use App\Http\Controllers\Api\InvoiceController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\PartnerController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'auth:sanctum', 'prefix' => 'user'], function () {
    Route::get('/', function (Request $request) {
        return $request->user();
    });
});

Route::group(['namespace' => 'Api'], function () {
    Route::group(['prefix' => 'partners'], function () {
        Route::get('/', [PartnerController::class, 'index']);
        Route::get('/duplicated', [PartnerController::class, 'duplicated']);
        Route::get('/{partner}/orders', [PartnerController::class, 'orders']);
    });
    Route::group(['prefix' => 'products'], function () {
        Route::get('/', [ProductController::class, 'index']);
        Route::get('/sum-order', [ProductController::class, 'sumOrders']);
    });
    Route::group(['prefix' => 'orders'], function () {
        Route::get('/', [OrderController::class, 'index']);
    });
    Route::group(['prefix' => 'invoices'], function () {
        Route::get('/', [InvoiceController::class, 'index']);
        Route::get('/paid', [InvoiceController::class, 'paid']);
    });
});
