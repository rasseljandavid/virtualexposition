<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyDocument extends Model
{
	public function company()
    {
    	return $this->belongsTo(User::class);
    }
}
