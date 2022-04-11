<?php

use App\Http\Controllers\Api\SubscriptionController;
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

Route::get('/test', function (Request $request) {
    return 'ok';
});

// create a post
Route::post('/store-post', [SubscriptionController::class, 'storePost']);

// create a website
Route::post('/store-website', [SubscriptionController::class, 'storeWebsite']);

// create a post
Route::post('/store-post', [SubscriptionController::class, 'storePost']);

// subscribe a website
Route::post('/subscribe', [SubscriptionController::class, 'subscribe']);

// publish a post
Route::get('/publish-post/{post}', [SubscriptionController::class, 'publishPost']);
