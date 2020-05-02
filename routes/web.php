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
// Route::get('contact', function () {
//     return view('contact');
// });
// Route::get('about', function () {
//     return view('about');
// });
Route::view('contact', 'contact');
Route::view('about', 'about');
/* 
Model - 
1. Represents a single row in the database
2. Responsible for saving, reading, deleting or anything for that particular row.
php artisan make:model Customers -m 
Create a migrate for that model to hold the data as well.
*/
Route::get('customers', 'CustomersController@list');
Route::get('customers/create', 'CustomersController@create');


Route::get('getState','CustomersController@getStates');
Route::get('/getCity/{id}','CustomersController@getCity');


Route::post('customers', 'CustomersController@store');

Route::get('customers/create', 'CandidatesController@create');
Route::post('customers', 'CandidatesController@store');

