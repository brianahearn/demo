<?php

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

Route::apiResource('users','UserController');
// Route::get('/', function () {
//     return view('welcome');
// });
//
// Route::get('/test', 'TestController@index');

// Route::group([
//   'prefix' => 'user',
// ], function () {
//   Route::get('/{id}','UserController@getUser');
//   Route::post('/ ','UserController@addUser');
//   Route::put('/{name}','UserController@updateUser');
//   Route::delete('/{name}','UserController@delete');
// });

//Admin
// Route::group([
//   'prefix' => 'users',
// ], function () {
//   Route::get('/','UserController@getUsers');
// });

// Route::group([
//   'prefix' => 'user/inventory',
// ], function () {
//
//   //get inventory
//   Route::get('/','InvetoryController@getInventory');
//   //add item
//   Route::post('/{name}','InventoryController@addItem');
//   //add items
//   Route::post('po')
//   //remove from inventory
//   Route::delete('/{name}','InventoryController@delete');
//
//   Route::get('/getExternalDocs/{assetName}/{fileType}','SupplierController@getExternalDocs');
// });


// Route::group([
//   'prefix' => 'shoppinglist',
// ], function () {
//
// });
//
// Route::group([
//   'prefix' => 'stores',
// ], function () {
//
// });
//
// Route::group([
//   'prefix' => 'budget',
// ], function () {
//
// });
//
// Route::group([
//   'prefix' => 'history',
// ], function () {
// });
//
// Route::group([
//   'prefix' => 'stats',
// ], function () {
//
// });
