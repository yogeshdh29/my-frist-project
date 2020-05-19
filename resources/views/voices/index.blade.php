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

<table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>User ID</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>DOB</th>
            </tr>
        </thead>
        <tbody>
@foreach($voices as $voice)
            <tr>
                <td>{{ $voice->id }}</td>
                <td>{{ $voice->user_id }}</td>
                <td><a href="/voices/{{ $voice->id }}">{{ $voice->name }}</a></td>
                <td>{{ "+".$voice->country_id.$voice->mobile }}</td>
                <td>{{ $voice->email }}</td>
                <td>{{ $voice->dob}}</td>
            </tr>
        </tbody>
@endforeach

        <tfoot>
            <tr>
                <th>ID</th>
                <th>User ID</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>DOB</th>
            </tr>
        </tfoot>
    </table>

@endsection('content')
