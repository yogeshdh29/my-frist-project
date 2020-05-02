@extends('layout')

@section('title', 'Customer List')
	
@section('content')

<div class="row">
	<div class="col-12">
		<h1>Customers</h1>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<form action="/customers" method="POST" class="pb-5">
			@csrf
			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" name="name" class="form-control" value="{{ old('name') }}">
			</div>

			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" name="email" class="form-control" value="{{ old('email') }}">
			</div>
			<div class="form-group">
				<label for="status">Status</label>
				<select name="active" id="active" class="form-control">
					<option value="">--</option>
					<option value="1">Active</option>
					<option value="0">Inactive</option>
				</select>
			</div>

			<div class="form-group">
				<label for="company">Company</label>
				<select id="company_id" name="company_id" class="form-control">
					@foreach($companies as $com)
						<option value="{{ $com->id }}">{{ $com->name }}</option>
					@endforeach
				</select>
			</div>
			<button type="submit" class="btn btn-info">Add Customers</button>
		</form>		
	</div>
</div>


<div class="row">
	<div class="col-12">
		@foreach($customers as $customer)
		<ul>			
			<li>{{ $customer->name }} </li>
			<li>{{ $customer->email }} </li>
			<li>{{ $customer->active }} </li>
			<li>{{ $customer->company->name}}</li>
		</ul>
		@endforeach
	</div>
</div>

<div class="row">
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
</div>
@endsection('content')