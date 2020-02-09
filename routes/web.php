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


Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', 'TestController@index');

Route::group([
  'prefix' => '/user/inventory',
], function () {


  //get inventory
  Route::get('/','InvetoryController@getInventory');
  //add item
  Route::post('/{name}','InventoryController@addItem');
  //add items

  //remove from inventory
  Route::delete('/{name}','InventoryController@delete');

  Route::get('/getExternalDocs/{assetName}/{fileType}','SupplierController@getExternalDocs');
});


Route::group([
  'prefix' => 'shoppinglist',
], function () {
  Route::get('/getAttachments/{fulfillerType}/{fulfillerHash}/{invoiceType}/{purchaseOrderHashes}','SupplierController@getAttachments');
  Route::get('/getS3SupplierAsset/{fileName}/{type?}','SupplierController@getSupplierAssetsZip');
  Route::get('/getExternalDocs/{assetName}/{fileType}','SupplierController@getExternalDocs');
});

Route::group([
  'prefix' => 'stores',
], function () {
  Route::get('/getAttachments/{fulfillerType}/{fulfillerHash}/{invoiceType}/{purchaseOrderHashes}','SupplierController@getAttachments');
  Route::get('/getS3SupplierAsset/{fileName}/{type?}','SupplierController@getSupplierAssetsZip');
  Route::get('/getExternalDocs/{assetName}/{fileType}','SupplierController@getExternalDocs');
});

Route::group([
  'prefix' => 'budget',
], function () {
  Route::get('/getAttachments/{fulfillerType}/{fulfillerHash}/{invoiceType}/{purchaseOrderHashes}','SupplierController@getAttachments');
  Route::get('/getS3SupplierAsset/{fileName}/{type?}','SupplierController@getSupplierAssetsZip');
  Route::get('/getExternalDocs/{assetName}/{fileType}','SupplierController@getExternalDocs');
});

Route::group([
  'prefix' => 'history',
], function () {
  Route::get('/getAttachments/{fulfillerType}/{fulfillerHash}/{invoiceType}/{purchaseOrderHashes}','SupplierController@getAttachments');
  Route::get('/getS3SupplierAsset/{fileName}/{type?}','SupplierController@getSupplierAssetsZip');
  Route::get('/getExternalDocs/{assetName}/{fileType}','SupplierController@getExternalDocs');
});

Route::group([
  'prefix' => 'stats',
], function () {
  Route::get('/getAttachments/{fulfillerType}/{fulfillerHash}/{invoiceType}/{purchaseOrderHashes}','SupplierController@getAttachments');
  Route::get('/getS3SupplierAsset/{fileName}/{type?}','SupplierController@getSupplierAssetsZip');
  Route::get('/getExternalDocs/{assetName}/{fileType}','SupplierController@getExternalDocs');
});
