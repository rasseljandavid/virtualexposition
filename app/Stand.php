<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Auth;

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

    public function reserve()
    {
    	$this->user_id = Auth::user()->id;
    	return $this->save();
    }
}