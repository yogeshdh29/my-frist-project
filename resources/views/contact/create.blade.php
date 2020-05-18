@extends('layouts.app') 

@section('content')

	@if(! session()->has('message'))

    <h1>Contact Us</h1>
	

    <form action="{{ route('contact.store') }}" method="POST">
    @csrf	
	<div class="form-group">
		<label for="name">Name</label>
		<input type="text" name="name" class="form-control" value="{{ old('name') }}">
		<div>{{ $errors->first('name') }}</div>
	</div>

	<div class="form-group">
		<label for="email">Email</label>
		<input type="email" name="email" class="form-control" value="{{ old('email') }}">
		<div>{{ $errors->first('email') }}</div>
	</div>

	<div class="form-group">
		<label for="message">Message</label>
		<textarea name="message" id="message" cols="30" class="form-control" value="{{ old('message')}}">
		</textarea>
		<div> {{ $errors->first('message') }}</div>			

	</div>

	<button type="submit" class="btn btn-info">Contact</button>
	</form>
	@endif	    
@endsection