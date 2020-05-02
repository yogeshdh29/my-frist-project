@extends('layout')

@section('content')

<h1>Customer</h1>

<div class="row">
    <h1>Customers</h1>
</div>
<div class="row">
    <form action="/customers" method="POST" class="pb-5">
    @csrf
        <div class="form-group pb-2">
        <label for="name">Name</label>
            <input type="text" name="name" value="{{ old('name') }}"> 
            <div>{{ $errors->first('name') }}</div>
        </div>
        <div class="form-group pb-2">
        <label for="email">Email</label>
            <input type="text" name="email" value="{{ old('email') }}">
            <div>{{ $errors->first('email') }}</div>
        </div>
    <button type="submit" class="btn btn-primary">Add Customers</button>
    </form>
</div>

@foreach($customers as $cus)
<li>{{ $cus->name }}</li>
@endforeach
@endsection