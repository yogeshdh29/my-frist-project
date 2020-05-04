@extends('layouts.app') 

@section('title', 'Customer List')
	
@section('content')

<div class="row">
	<div class="col-12">
		<h1>Customers</h1>
		<p><a href="customers/create">Add New Customer</a></p>
	</div>
</div>

<div class="row">
	<div class="col-2"><label>ID</label></div>
	<div class="col-2"><label>Name</label></div>
	<div class="col-2"><label>Email</label></div>
	<div class="col-2" align="center"><label>Status</label></div>
	<div class="col-2"><label>Company</label></div>
</div>

@foreach($customers as $customer)
<div class="row">
	<div class="col-2">{{ $customer->id }}</div>
	<div class="col-2"><a href="/customers/{{ $customer->id }}">{{ $customer->name }}</a></div>		
	<div class="col-2">{{ $customer->email }}</div>
	<div class="col-2" align="center">{{ $customer->active }}</div>
	<div class="col-2">{{ $customer->company->name}}</div>
</div>
@endforeach
<!-- <div class="row">
	<div class="col-12">
		@foreach($companies as $company)
			<li>{{ $company->name }} </li>
			
			<ul>
			@foreach($company->customers as $customer)
				<li>{{ $customer->name }} </li>
			@endforeach
			</ul>
		@endforeach
	</div>
</div> -->
@endsection('content')