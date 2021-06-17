<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers as Controllers;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:sanctum')->group(function(){
    Route::post('search', [Controllers\Controller::class, 'search']);
    Route::resource('products', Controllers\ProductController::class);
    Route::resource('categories', Controllers\CategoryController::class);
    Route::resource('sub-categories', Controllers\SubCategoryController::class);

    Route::get('get-categories', [Controllers\CategoryController::class, 'get_categories']);
    Route::get('get-sub-categories/{category_id}', [Controllers\SubCategoryController::class, 'get_sub_categories']);
});

Route::post('login', [Controllers\UserController::class, 'login']);
Route::post('logout', [Controllers\UserController::class, 'logout']);
