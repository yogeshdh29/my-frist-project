@csrf
<div class="form-group">
	<label for="ID">ID</label>
	<input type="number" name="user_id" class="form-control" max='99999' min="0" value="{{ old('user_id')?? $voice->user_id }}">
	<div>{{ $errors->first('user_id') }}</div>
</div>

<div class="form-group">
	<label for="name">Name</label>
	<input type="text" name="name" pattern="^[a-zA-Z ]*$" class="form-control" pattern="[A-Za-z]{3}" value="{{ old('name') ?? $voice->name }}">
	<div>{{ $errors->first('name') }}</div>
</div>
<div class="form-group">
	<label for="name">Mobile</label>	
	<div class="row">
		<div class="col-3">
			<div class="form-group">
				<select id="country_id" name="country_id" class="form-control">
						<option value="{{ $voice->country_id }}" {{ $voice->country_id == $voice->country_id ? 'selected': '+'}}>
						@php if($voice->country_id) {
						@endphp

							{{ "+".$voice->country_id }}
						@php
						}
						@endphp
						</option>
						<option data-countryCode="GB" value="44">UK (+44)</option>
						<option data-countryCode="US" value="1">USA (+1)</option>
						<option data-countryCode="IN" value="91">India (+91)</option>
						<optgroup label="Other countries">
							<option data-countryCode="DZ" value="213">Algeria (+213)</option>
							<option data-countryCode="AD" value="376">Andorra (+376)</option>
							<option data-countryCode="AO" value="244">Angola (+244)</option>
							<option data-countryCode="HU" value="36">Hungary (+36)</option>
							<option data-countryCode="IS" value="354">Iceland (+354)</option>
							<option data-countryCode="ID" value="62">Indonesia (+62)</option>
							<option data-countryCode="IR" value="98">Iran (+98)</option>
							<option data-countryCode="IQ" value="964">Iraq (+964)</option>
							<option data-countryCode="IE" value="353">Ireland (+353)</option>
							<option data-countryCode="IL" value="972">Israel (+972)</option>
							<option data-countryCode="YE" value="967">Yemen (South)(+967)</option>
							<option data-countryCode="ZM" value="260">Zambia (+260)</option>
							<option data-countryCode="ZW" value="263">Zimbabwe (+263)</option>
						</optgroup>						
				</select>
			</div>
		</div>
		<div class="col-6">
			<input type="number" name="mobile" min="0" max="9999999999" class="form-control" value="{{ old('mobile') ?? $voice->mobile }}">
			<div>{{ $errors->first('mobile') }}</div>			
		</div>
	</div>
</div>
<div class="form-group">
	<label for="email">Email</label>
	<input type="email" name="email" class="form-control" value="{{ old('email') ?? $voice->email }}">
	<div>{{ $errors->first('email') }}</div>
</div>
<div class="form-group">
	<label for="dob">DOB</label>
	<input type="date" name="dob" id="dob" class="form-control" placeholder="DD-MM-YYYY" value="{{ old('dob') ?? $voice->dob }}">
    	
	<div>{{ $errors->first('dob') }}</div>
</div>
<div class="form-group d-flex flex-column">
	<label for="image">Profile Image</label>
	<input type="file" name="image" id="image" class="py-2">
	<div>{{ $errors->first('image') }}</div>
</div>
