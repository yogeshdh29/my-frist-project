@extends('layouts.app') 

@section('title', 'Edit Customer'. $customer->name)
	
@section('content')

<div class="row">
	<div class="col-12">
		<h1>Edit Customer {{ $customer->name }}</h1>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<form action="{{ route('customers.update',['customer' => $customer]) }}" method="POST" class="pb-5" enctype="multipart/form-data">
			@method('PATCH')
			@include('customers.form')			
			<button type="submit" class="btn btn-info">Edit Customers</button>			
		</form>		
	</div>
</div>

@endsection('content')