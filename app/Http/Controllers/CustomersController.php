<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\State;
use App\City;
use \Input as Input;

class CustomersController extends Controller
{
    public function create(){
        // $states = State::pluck('state_name','id');
        $states = State::all()->pluck('state_name', 'id');
        //dd($states);
        return view('create',compact('states'));
    }
    //For fetching cities
    public function getCity($id)
    {
        $city = City::where('state_id',$id)->pluck('city_name','id');
        return response()->json($city);
    }


    public function store(){
        $customer = Customer::create($this->validateRequest());
        
        $this->storeImage($customer);

        return back();
    }

    public function validateRequest(){


        return tap(request()->validate([
            'name' => 'required',
            'birth_date' => '',
            'gender' => '',
            'state' => '',
            'city' => '',
            'education' => '',
            'year_complete' => '',
            'skill' => '',
 
        ]), function () {
            if(request()->hasFile('image')) {
                request()->validate([
                    'image' => 'image',
                ]);
            }
        });
        
        $skill = request('skill');
        $arr = implode("|",$skill);
        $customer->skill = $arr;


    }
    public function storeImage($customer) {
        if(request()->has('image')) {
            $customer->update([
                'profile_photo' => request()->image->store('uploads', 'public'), 
            ]);
        }
    }
}
