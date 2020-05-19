@extends('layouts.app') 

@section('title', 'Voice User Detail')
	
@section('content')

<div class="row">
	<div class="col-12">
		<h1>Customer Detail</h1>
		<p><a href="/voices/{{ $voice->id }}/edit">Edit Voice User</a></p>
		<p>
			<form action="/voice/{{ $voice->id}}" method="POST">
			@method('DELETE')
			@csrf
			<button type="submit" class="btn btn-danger">Delete</button>
		</form>
		</p>
	</div>
</div>

<div class="row">
	<div class="col-2"><label>ID</label></div>
	<div class="col-2"><label>User ID</label></div>
	<div class="col-2"><label>Name</label></div>
	<div class="col-2"><label>Email</label></div>
	<div class="col-2" align="center"><label>DOB</label></div>
	<div class="col-2"><label>Mobile</label></div>
</div>

<div class="row">
	<div class="col-2">{{ $voice->id }}</div>
	<div class="col-2">{{ $voice->user_id }}</div>
	<div class="col-2"><a href="/voices/{{ $voice->id }}">{{ $voice->name }}</a></div>		
	<div class="col-2">{{ $voice->email }}</div>
	<div class="col-2" align="center">{{ $voice->dob }}</div>
	<div class="col-2" align="left">{{ $voice->mobile }}</div>
	
</div>

@if($voice->image)
<div class="row">
	<div class="col-12">
	<img src="{{ asset('storage/'.$voice->image )}}" alt="">
	</div>
</div>
@endif
@endsection('content')