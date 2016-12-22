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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::resource('items', 'ItemController');
/*
Route::get('items', function () {
  return App\Item::orderBy('code', 'desc')->get();
});

Route::post('items', function (Request $request) {
  return App\Item::create($request->all());
});

Route::get('items/{id}', function ($id) {
    return App\Item::findOrFail($id);
  });

  Route::post('items/store', function (Request $request) {
    return App\Item::create($request->all());
  });

  Route::patch('items/{id}', function (Request $request, $id) {
    App\Item::findOrFail($id)->update($request->all());
  });

  Route::delete('items/{id}', function ($id) {
    return App\Item::destroy($id);
  });*/
