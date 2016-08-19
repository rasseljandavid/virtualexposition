<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
	protected $fillable = [
		'name',
		'location',
		'eventdate'
	];

    public function stands()
    {
    	return $this->hasMany(Stand::class);
    }
}
