<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::pattern('id', '[0-9]+');

Route::get('user/{id?}', function($id = 1){
    if($id)
        return "Id " . $id;

    return "Sem Id";

})->where('id', '[0-9]+');
//->where('id', '[A-Za-z]+');

Route::group(['prefix' => 'admin'], function(){
    Route::get('products', function(){
        return 'Produto';
    });
});

Route::get('category/{category}', function(\CodeCommerce\Category $category){
    return $category->name;
});


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::auth();

    Route::get('/home', 'HomeController@index');

    Route::get("categories", "CategoriesController@index");

    Route::get("categories/create", "CategoriesController@create");

    Route::post("categories", "CategoriesController@store");

    Route::get("categories/{id}/destroy", "CategoriesController@destroy");
});




//Rotas para a entrega do Projeto
Route::group(["prefix" => "admin"], function(){
    Route::get("category/{category}", function(\CodeCommerce\Category $category){
        return $category->name;
    });

    Route::get("product/{product}", function(\CodeCommerce\Product $product){
        return $product->name;
    });
});

