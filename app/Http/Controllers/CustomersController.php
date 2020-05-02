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
    	$customer = new Customer();

    	return view('customers.create',compact('customers','companies','customer'));
    }

    private function validateRequest() {

    	return request()->validate([
    		'name' => 'required',
    		'email' => 'required|email',
    		'active' => 'required',
    		'company_id' => 'required',    		
    	]);
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

    	$customer->update($this->validateRequest());
    	return redirect('customers/'. $customer->id);    	
    }

    public function store() {

    	Customer::create($this->validateRequest());

    	return redirect('customers');
    }

    public function destroy(Customer $customer) {

    	$customer->delete();

    	return redirect('customers');
    }
}
