@csrf
<div class="form-group">
	<label for="name">Name</label>
	<input type="text" name="name" class="form-control" value="{{ old('name')?? $customer->name }}">
	<div>{{ $errors->first('name') }}</div>
</div>

<div class="form-group">
	<label for="email">Email</label>
	<input type="email" name="email" class="form-control" value="{{ old('email') ?? $customer->email }}">
	<div>{{ $errors->first('email') }}</div>
</div>
<div class="form-group">
	<label for="status">Status</label>
	<select name="active" id="active" class="form-control">
		<option value="">--</option>
		<option value="1" {{ $customer->active == 'Active'? 'selected' : ''}}>Active</option>
		<option value="0" {{ $customer->active == 'Inactive'? 'selected' : ''}}>Inactive</option>
	</select>
</div>

<div class="form-group">
	<label for="company">Company</label>
	<select id="company_id" name="company_id" class="form-control">
		@foreach($companies as $com)
			<option value="{{ $com->id }}" {{ $com->id == $customer->company_id ? 'selected': ''}}>{{ $com->name }}</option>
		@endforeach
	</select>
</div>