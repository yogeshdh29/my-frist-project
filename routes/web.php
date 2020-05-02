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
Route::post('customers', 'CustomersController@store');

/*
Eloquent is a Database ORM that Laravel uses behind the scenes. Eloquent is able to handle many different drivers of databases. 
Have to learn only 1 Eloquent option that will give access to other drivers.

Scope - Scope is like a filter.
How to declare a Scope?
Model - Naming convention
public function starts with "scope" scopeActive($query)

 */
