<?php

use Facade\FlareClient\Api;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('restaurants', 'Api\RestaurantController');
Route::resource('dishes', 'Api\DishController');
Route::resource('orders', 'Api\OrderController');
Route::resource('categories', 'Api\CategoryController');
Route::resource('courses', 'Api\CourseController');
Route::resource('categorysearch', 'Api\CategorySearchController');

Route::get('restaurantsearch/{name}', 'Api\restaurantsearchcontroller@research');
Route::get('orderrestaurant/{id}', 'Api\OrderController@orderRestaurant');
Route::get('userRestaurant/{id}', 'Api\RestaurantController@userRestaurant');
