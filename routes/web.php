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
Auth::routes();

Route::get('/', function () {
    return view('admin.index');
})->name('home');


Route::resource('personal', 'PersonalController');
Route::resource('food', 'FoodController');
Route::resource('drink', 'DrinkController');
Route::resource('dessert', 'DessertController');