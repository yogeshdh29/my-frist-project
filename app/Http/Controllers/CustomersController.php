<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Company;

class CustomersController extends Controller
{
    //
    public function list() {
    	$customers = Customer::all();
    	$companies = Company::all();

    	return view('internals.customers', compact('customers','companies'));
    }

    public function store() {

    	$customer = new Customer();

    }
}
