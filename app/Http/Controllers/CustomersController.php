<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Company;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeNewUserMail;
use App\Events\NewCustomerHasRegisteredEvent;
use Intervention\Image\Facades\Image;

class CustomersController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $customers = Customer::with('company')->get();

        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        $customers = Customer::all();
        $companies = Company::all();
        $customer = new Customer();

        return view('customers.create', compact('customers', 'companies', 'customer'));
    }

    private function validateRequest()
    {

        return request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'active' => 'required',
            'company_id' => 'required',
            'image' => 'sometimes|file|image|max:5000'
        ]);
    }

    public function show(Customer $customer)
    {

        //    	$customer = Customer::where('id', $customer)->firstOrFail();
        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        $companies = Company::all();

        return view('customers.edit', compact('customer', 'companies'));
    }

    public function store()
    {

        $customer = Customer::create($this->validateRequest());

        $this->storeImage($customer);

        event(new NewCustomerHasRegisteredEvent($customer));

        //   	return redirect('customers');
    }

    public function update(Customer $customer)
    {

        $customer->update($this->validateRequest());
        $this->storeImage($customer);

        return redirect('customers/' . $customer->id);
    }

    public function destroy(Customer $customer)
    {

        $customer->delete();

        return redirect('customers');
    }

    public function storeImage($customer)
    {
        if (request()->has('image')) {
            $customer->update([
                'image' => request()->image->store('uploads', 'public'),
            ]);
        }

        $image = Image::make(public_path('storage/' . $customer->image))->crop(300, 300);
        $image->save();
    }
}
