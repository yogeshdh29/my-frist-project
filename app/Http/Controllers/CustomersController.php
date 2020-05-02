<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Company;

class CustomersController extends Controller
{
    //
    public function index() {
    	$customers = Customer::all();
    	$companies = Company::all();

    	return view('customers.index', compact('customers','companies'));
    }

    public function create() {
    	$customers = Customer::all();
    	$companies = Company::all();

    	return view('customers.create',compact('customers','companies'));
    }

    public function show(Customer $customer) {

//    	$customer = Customer::where('id', $customer)->firstOrFail();
    	return view('customers.show',compact('customer'));
    }

    public function edit(Customer $customer) {
    	$companies = Company::all();

    	return view('customers.edit', compact('customer','companies'));
    }

    public function update(Customer $customer) {
    	$data = request()->validate([
    		'name' => 'required',
    		'email' => 'required|email',
    	]);

    	$customer->update($data);
    	return redirect('customers/'. $customer->id);    	
    }

    public function store() {

    	$data = request()->validate([
    		'name' => 'required',
    		'email' => 'required|email',
    		'active' => '',
    		'company_id' => 'required',
    	]);

    	Customer::create($data);

    	return redirect('customers');
    }
}
