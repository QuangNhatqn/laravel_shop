<?php
Route::get('/', [
   'as' => 'index',
   'uses' => 'App\Http\Controllers\ClientHomeController@index'
]);

Route::get('/category/{slug}', [
    'as' => 'category.product',
    'uses' => 'App\Http\Controllers\ClientCategoryController@index'
]);

?>
