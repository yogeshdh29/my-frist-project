@extends('layouts.app') 

@section('title', 'Add Voice Users')
	
@section('content')

<div class="row">
	<div class="col-12">
		<h1>Add Voice Users</h1>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<form action="/voices" method="POST" class="pb-5" enctype="multipart/form-data">
			@include('voices.form')
			
			<button type="submit" class="btn btn-info">Add voices Users</button>
			<button type="reset" class="btn btn-primary">Reset</button>			
		</form>		
	</div>
</div>

@endsection('content')