<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Voice;

class VoicesController extends Controller
{
    
    public function index()
    {
        $voices = Voice::all();
        
        return view('voices.index', compact('voices'));
    }

    public function create()
    {
        $voices = Voice::all();
        $voice = new Voice();

        return view('voices.create', compact('voices','voice'));
    }

    private function validateRequest()
    {

        return tap(request()->validate([
            'user_id' => 'required',
            'name' => 'required',
            'mobile' => 'required',
            'email' => 'required|email',
            'dob' => 'required',
            'image' => 'required|image'

        ]), function () {

            if (request()->hasFile('image')) {
                request()->validate([
                    'image' => 'file|image|max:5000',
                ]);
            }
        });
    }

    public function show(Voice $voice)
    {
        return view('voices.show', compact('voice'));
    }

    public function edit(Voice $voice)
    {
        $companies = Voice::all();

        return view('voices.edit', compact('voice'));
    }

    public function store()
    {
        $voice = Voice::create($this->validateRequest());        
        $this->storeImage($voice);
        return redirect('voices');
    }

    public function update(Voice $voice)
    {

        $voice->update($this->validateRequest());
        $this->storeImage($voice);

        return redirect('voices/' . $voice->id);
    }

    public function destroy(Voice $voice)
    {
        $voice->delete();

        return redirect('voices');
    }

    public function storeImage($voice)
    {
        if (request()->has('image')) {
            $voice->update([
                'image' => request()->image->store('uploads', 'public'),
            ]);
        }
    }

}
