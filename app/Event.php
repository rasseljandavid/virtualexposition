<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Stand;

class Event extends Model
{
	protected $fillable = [
		'name',
		'body',
		'location',
		'eventstart',
		'eventend',
		'latitude',
		'longtitude'
	];

    public function stands()
    {
    	return $this->hasMany(Stand::class);
    }

    public function saveEvent($request)
    {
    	//Convert first the start and end date to timestamp format then save the event
    	$request['eventstart']  = strtotime($request['eventstart']);
    	$request['eventend'] 	= strtotime($request['eventend']);
    	$event = Event::create($request);

    	//Add the Stands
    	$stand = new Stand;
    	$stand->addStand($request['stands'], $event);

    	return;
    }
}
