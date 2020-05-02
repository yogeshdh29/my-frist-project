@extends('layout')

@section('title', 'Add Customer')
	
@section('content')

<div class="row">
	<div class="col-12">
		<h1>Addd Customers</h1>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<form action="/customers" method="POST" class="pb-5">
			@include('customers.form')
			
			<button type="submit" class="btn btn-info">Add Customers</button>			
		</form>		
	</div>
</div>

@endsection('content')