@extends('layout')

@section('content')

<div class="row">
    <h1>Customers</h1>
</div>
<div class="row">
    <form action="/customers" method="POST" class="pb-5" enctype="multipart/form-data">
    @csrf
        <div class="form-group pb-2">
        <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}"> 
            <div>{{ $errors->first('name') }}</div>
        </div>
        <div class="form-group pb-2">
        <label for="Birthdate">Birthdate</label>
            <input type="date" name="birth_date" id="birth_date" value="{{ old('birth_date') }}"> 
            <div>{{ $errors->first('birth_date') }}</div>
        </div>
        <div class="form-group pb-2">
        <label for="gender">Gender</label>
            <input type="radio" name="gender" id="gender" value="male{{ old('gender') }}"> 
                <label for="male">Male</label>
            <input type="radio" name="gender" id="gender" value="female{{ old('gender') }}"> 
                <label for="female">Female</label>
            <input type="radio" name="gender" id="gender" value="other{{ old('gender') }}"> 
                <label for="other">Other</label>            
            <div>{{ $errors->first('gender') }}</div>
        </div>
        <div class="form-group pb-2">
        <label for="gender">State</label>
            <select class="form-control target" name="state" id="state">
                <option value="a">--State--</option>     
                @foreach($states as $key=>$val)
                <option value="{{ $key }}">{{ $val }}</option>
                @endforeach           
            </select>
        </div>
        <div class="form-group pb-2">
        <label for="gender">Cityyy</label>
            <select class="form-control" name="city" id="city">
                <option value="">--CITY--</option>
            </select>
        </div>
        <div id="ed"> 
            <div class="form-group pb-2">
                <label for="education">Education</label>
                <input type="text" name="education" id="education">
                <label for="year">Year Complete</label>
                <input type="date" placeholder="YYYY" name="year_complete" id="year_complete">
                <input type="button" name="add_edu" id="add_edu" class="btn btn-warning" value="+">
            </div>
        </div>
        <div class="form-group pb-2">
            <label for="image">Profile Photo</label>
            <input type="file" id="image" name="image" class="form-control">
        <div class="row pb-5" id="preview_img">            
        </div>
        <div class="form-group">
            <label for="gender">Skills</label>
            <select class="js-example-basic-multiple" name="skill[]" id="skill" multiple="multiple">
              <option value="Java">Java</option>
              <option value="Java2">Java2</option>
              <option value="Java3">Java3</option>
              <option value="Java">Java</option>
              <option value="PHP5">PHP5</option>

            </select>
        </div>
        <div class="form-group pb-2">
        <label for="email">Email</label>
            <input type="text" name="email" id="email" value="{{ old('email') }}">
            <div>{{ $errors->first('email') }}</div>
        </div> 
        <div class="form-group pb-2">
        <label for="email">Mobile</label>
            <input type="text" name="mobile" id="mobile" value="{{ old('mobile') }}">
            <div>{{ $errors->first('mobile') }}</div>
        </div>
    <button type="submit" class="btn btn-primary">Add Customers</button>
    </form>
</div>
@endsection