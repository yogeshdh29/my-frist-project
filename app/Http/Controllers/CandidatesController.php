<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\State;
use App\City;
use App\Candidate;

class CandidatesController extends Controller
{
    //
    public function create(){
        $states = State::all()->pluck('state_name', 'id');
        return view('create',compact('states'));
    }
   public function getCity($id)
    {
        $city = City::where('state_id',$id)->pluck('city_name','id');
        return response()->json($city);
    }

    public function store() {

    	$candidate = new Candidate;
    	$candidate->name = request()->input('name');
    	$candidate->birth_date = request()->input('birth_date');
    	$candidate->gender = request()->input('gender');
    	$candidate->state = request()->input('state');
    	$candidate->city = request()->input('city');
    	$education = request()->input('education');
    	$year_complete = request()->input('year_complete');
    	$skill = request()->input('skill');
    	$candidate->skill = implode("|", $skill);
    	$candidate->email = request()->input('email');
    	$candidate->mobile = request()->input('mobile');
    	
    	$candidate->save();
    	return response()->json($candidate);

    	//$candidate = Candidate::create($this->validateRequest());

    	$this->storeImage($candidate);

    	return redirect('create'); 
    }

    public function storeImage($candidate) {
    	if(request()->has('image')) {
    		$candidate->update([
    			'image' => request()->image->store('uploads', 'public'),
    		]);
    	}
    }
    public function validateRequest() {

    	return tap(request()->validate([
    	]), function () {

	    	if(request()->hasFile('image')) {
	    		request()->validate([
	    			'image' => 'file|image'
	    		]);
	    	}

    	});
    }

    public function showbyid($id) {
    	$candidate = Candidate::where('mobile', $id)->first();
    	return response()->json($candidate);
    }

    public function updatebyid(Request $request, $id) {
    	$candidate = Candidate::where('mobile', $id)->first();
    	$candidate->name = $request->input('name');
    	$candidate->gender = $request->input('gender');
    	$candidate->mobile = $request->input('mobile');

    	$candidate->save();
    	return response()->json($candidate);
    		
    }

}
