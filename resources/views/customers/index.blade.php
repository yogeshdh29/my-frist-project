@extends('layouts.app') 

@section('title', 'Customer List')
	
@section('content')

<div class="row">
	<div class="col-12">
		<h1>Customer List</h1>		
	</div>
</div>

@can('create', \App\Customer::class)
<div class="row">
	<div class="col-12">
		<p><a href="customers/create">Add New Customer</a></p>
	</div>
</div>
@endcan

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

	<div class="col-2">
		@can('view', $customer)
		<a href="/customers/{{ $customer->id }}">
			{{ $customer->name }}
		</a>
		@endcan

		@cannot('view', $customer)
			{{ $customer->name }}
 		@endcan
	</div>		
	<div class="col-2">{{ $customer->email }}</div>
	<div class="col-2" align="center">{{ $customer->active }}</div>
	<div class="col-2">{{ $customer->company->name}}</div>
</div>
@endforeach
<div class="row">
	<div class="col-12 pt-5 d-flex justify-content-center">
		{{ $customers->links() }}
	</div>
</div>


@endsection('content')