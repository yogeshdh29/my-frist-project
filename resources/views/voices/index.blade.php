@extends('layouts.app') 

@section('title', 'Voice User List')
	
@section('content')

<div class="row">
	<div class="col-12">
		<h1>Voice User List</h1>		
	</div>
</div>

<div class="row">
	<div class="col-12">
		<p><a href="voices/create">Add New voices</a></p>
	</div>
</div>

<div class="row">
	<div class="col-2"><label>ID</label></div>
	<div class="col-2"><label>User ID</label></div>
	<div class="col-2"><label>Name</label></div>
	<div class="col-2"><label>Mobile</label></div>
	<div class="col-2"><label>Email</label></div>
	<div class="col-2"><label>DOB</label></div>
</div>

@foreach($voices as $voice)
<div class="row">
	<div class="col-2">{{ $voice->id }}</div>
	<div class="col-2">{{ $voice->user_id }}</div>

	<div class="col-2">
		<a href="/voices/{{ $voice->id }}">
			{{ $voice->name }}
		</a>
	</div>		
	<div class="col-2">{{ $voice->mobile }}</div>
	<div class="col-2" align="center">{{ $voice->email }}</div>
	<div class="col-2">{{ $voice->dob}}</div>
</div>
@endforeach


@endsection('content')