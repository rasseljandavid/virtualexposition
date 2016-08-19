<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stand extends Model
{
	protected $fillable = [
		'title',
		'body',
		'price'
	];

    public function event()
    {
    	return $this->belongsTo(Event::class);
    }
}