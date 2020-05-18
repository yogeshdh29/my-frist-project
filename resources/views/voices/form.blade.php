@csrf
<div class="form-group">
	<label for="ID">ID</label>
	<input type="number" name="user_id" class="form-control" max='10000' min="0" value="{{ old('user_id')?? $voice->user_id }}">
	<div>{{ $errors->first('user_id') }}</div>
</div>

<div class="form-group">
	<label for="name">Name</label>
	<input type="text" name="name" class="form-control" value="{{ old('name') ?? $voice->name }}">
	<div>{{ $errors->first('name') }}</div>
</div>
<div class="form-group">
	<label for="mobile">mobile</label>
	<input type="text" name="mobile" class="form-control" value="{{ old('mobile') ?? $voice->mobile }}">
	<div>{{ $errors->first('mobile') }}</div>
</div>
<div class="form-group">
	<label for="email">Email</label>
	<input type="email" name="email" class="form-control" value="{{ old('email') ?? $voice->email }}">
	<div>{{ $errors->first('email') }}</div>
</div>
<div class="form-group">
	<label for="dob">DOB</label>
	<input type="date" name="dob" class="form-control" placeholder="DD-MM-YYYY" value="{{ old('dob') ?? $voice->dob }}">
	<div>{{ $errors->first('dob') }}</div>
</div>
<div class="form-group d-flex flex-column">
	<label for="image">Profile Image</label>
	<input type="file" name="image" id="image" class="py-2">
	<div>{{ $errors->first('image') }}</div>
</div>
