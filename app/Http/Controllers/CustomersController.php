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

    	$data = request()->validate([
    		'name' => 'required',
    		'email' => 'required|email',
    		'active' => '',
    		'company_id' => 'required',
    	]);

    	Customer::create($data);
    	
    	return back();
    }
}
