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
Route::view('contact', 'contact');
Route::view('about', 'about');
/* 
Model - 
1. Represents a single row in the database
2. Responsible for saving, reading, deleting or anything for that particular row.
php artisan make:model Customers -m 
Create a migrate for that model to hold the data as well.
*/
Route::get('customers', 'CustomersController@index');
Route::get('customers/create', 'CustomersController@create');
Route::post('customers', 'CustomersController@store');

/*
Conditions for Route Model Binding: 

	Route::get('customers/{"customer"}', 'CustomersController@show');
	The {"customer"} variable show match exactly with that in show() method
If we simply typehint the show(Customer $"customer") Model - It is used to fetch record automatically
Through use of Route Model Binding , we dont have to fetch the record. Laravel will do it automatically for us, returns 404 if not found.

public function show(Customer $"customer") { 
	return view('show', '"customer"');
}
*/

Route::get('customers/{customer}', 'CustomersController@show');
Route::get('customers/{customer}/edit', 'CustomersController@edit');
Route::patch('customers/{customer}', 'CustomersController@update');

/*
Eloquent is a Database ORM that Laravel uses behind the scenes. Eloquent is able to handle many different drivers of databases. 
Have to learn only 1 Eloquent option that will give access to other drivers.

Scope - Scope is like a filter.
How to declare a Scope?
Model - Naming convention
public function starts with "scope" scopeActive($query)

*/

/* 
Accessor or Mutator - Interject any calls we want to do something about it before it either displays on a page or saves it back into the database.

public function getActiveAttribute($attribute) {
	
	return [
		'0' => 'Inactive',
		'1' => 'Active',
	][$attribute];
}

getColumnNameAttribute($attribute)
*/
Route::delete('customers/{customer}', 'CustomersController@destroy');


/* 
RESTful controller 
php artisan make:controller -r -m Customer
Creates all restful methods for us with Route Model binding as well.
*/
//Route::resource('customers', 'CustomersController');
