<?php

use Illuminate\Http\Request;

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

Route::group([
    'prefix' => 'auth'
], function () {
    // These should not be protected by any middleware.
    Route::post('login', 'Auth\LoginController@login');
    Route::post('register', 'Auth\RegisterController@create');
    // These auth calls are protect by middleware auth:api - meaning you need to be logged in to access them.
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');

        //apiResource declares all the common REST endpoints for an API
        Route::apiResources([
          'users' => 'UserController',
          'stores' => 'StoreController',
          'pantries' => 'PantryController',
          'categories' => 'CategoryController',
          'products' => 'ProductController',
          'recipes' => 'RecipeController',
        ]);
    });
});
