<?php

use Illuminate\Support\Facades\Route;

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


Route::name('FactoryMethod.')->group(function () {
    Route::get('factorymethod', 'FactoryMethodController@index');

    Route::get('factorymethod/conceptual', 'FactoryMethodController@conceptual')
        ->name('Conceptual');

    Route::get('factorymethod/realworld', 'FactoryMethodController@realWorld')
        ->name('RealWorld');
});

Route::name('AbstractFactory.')->group(function () {
    Route::get('abstractfactory', 'AbstractFactoryController@index');

    Route::get('abstractfactory/conceptual', 'AbstractFactoryController@conceptual')
        ->name('Conceptual');

    Route::get('abstractfactory/realworld', 'AbstractFactoryController@realWorld')
        ->name('RealWorld');
});
