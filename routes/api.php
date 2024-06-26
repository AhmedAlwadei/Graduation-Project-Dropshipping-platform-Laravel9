<?php

use App\Http\Controllers\Webhook;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//WC API
//Route::get('/getStore',[WCController::class,'getStore']);
//Route::post('/create_webhook',[WCController::class,'createWebhook'])->name('WC.API.create.webhook');
//Route::post('/send_product_to_WC',[WCController::class , 'linkProduct'])->name('WC.API.link.product');
//Route::delete('/unlink_product_from_WC',[WCController::class,'unlinkProduct'])->name('WC.API.unlink.products');
//Route::get('/get_delivery',[WCController::class,'getDelivery'])->name('WC.API.get.delivery');
Route::post('/webhook/woocommerce/order-created', [Webhook::class,'orderCreated']);
