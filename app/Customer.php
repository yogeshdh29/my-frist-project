<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    //$protected $fillable = ['name', 'email']; Mention all fields to allow mass assignment on 
    protected $guarded = []; //Nothing is guarded, go ahead and mass assign any rows you want.

    public function company() {
    	return $this->belongsTo(Company::class);
    }
}
