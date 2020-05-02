@extends('layout')

@section('title', 'Customer Detail')
	
@section('content')

<div class="row">
	<div class="col-12">
		<h1>Customer Detail</h1>
		<p><a href="/customers/{{ $customer->id }}/edit">Edit Customer</a></p>
		<p>
			<form action="/customers/{{ $customer->id}}" method="POST">
			@method('DELETE')
			@csrf
			<button type="submit" class="btn btn-danger">Delete</button>
		</form>
		</p>
	</div>
</div>

<div class="row">
	<div class="col-2"><label>ID</label></div>
	<div class="col-2"><label>Name</label></div>
	<div class="col-2"><label>Email</label></div>
	<div class="col-2" align="center"><label>Status</label></div>
	<div class="col-2"><label>Company</label></div>
</div>

<div class="row">
	<div class="col-2">{{ $customer->id }}</div>
	<div class="col-2"><a href="/customers/{{ $customer->id }}">{{ $customer->name }}</a></div>		
	<div class="col-2">{{ $customer->email }}</div>
	<div class="col-2" align="center">{{ $customer->active }}</div>
	<div class="col-2">{{ $customer->company->name}}</div>
</div>

@endsection('content')