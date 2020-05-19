@extends('layouts.app') 

@section('title', 'Edit Voice User'. $voice->name)
	
@section('content')

<div class="row">
	<div class="col-12">
		<h1>Edit Voice {{ $voice->name }}</h1>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<form action="{{ route('voices.update',['voice' => $voice]) }}" method="POST" class="pb-5" enctype="multipart/form-data">
			@method('PATCH')
			@include('voices.form')			
			<button type="submit" class="btn btn-info">Edit Voice Users</button>			
		</form>		
	</div>
</div>

@endsection('content')