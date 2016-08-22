<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyDocument extends Model
{
	protected $fillable = [
		'path',
		'user_id'
	];
	public function company()
    {
    	return $this->belongsTo(User::class);
    }
}
