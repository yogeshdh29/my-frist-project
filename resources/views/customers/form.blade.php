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

		@foreach($customer->activeOptions() as $activeOptionsKey => $activeOptionsValue)
			<option value="{{ $activeOptionsKey }}" {{ $customer->active == $activeOptionsValue ? 'selected' : ''}}>{{ $activeOptionsValue }}</option>
		@endforeach
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

<div class="form-group d-flex flex-column">
	<label for="image">Profile Image</label>
	<input type="file" name="image" id="image" class="py-2">
	<div>{{ $errors->first('image') }}</div>
</div>
