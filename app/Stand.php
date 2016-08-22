<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stand extends Model
{
	protected $fillable = [
		'title',
		'price',
		'type'
	];

    public function event()
    {
    	return $this->belongsTo(Event::class);
    }
	
	public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function addStand($request, $event)
    {
    	foreach($request as $size => $stand) {
    		foreach($stand as  $item) {
	    		$event->stands()->create([
	    			'title'=>$item['title'], 
	    			'price'=>$item['price'], 
	    			'type'=>$size
	    		]);
    		}
    	}
    	return;
    }
}