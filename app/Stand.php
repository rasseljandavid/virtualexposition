<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Auth;

class Stand extends Model
{
	protected $fillable = [
		'title',
		'price',
		'type',
        'posx',
        'posy',
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
        $pos = array();
        //Ground
        $pos['ground'][0]['posx'] = "0.3781";
        $pos['ground'][0]['posy'] = "0.4296";
        $pos['ground'][1]['posx'] = "0.5163";
        $pos['ground'][1]['posy'] = "0.3050";
        //Second
        $pos['second'][0]['posx'] = "0.7935";
        $pos['second'][0]['posy'] = "0.2736";
        $pos['second'][1]['posx'] = "0.2021";
        $pos['second'][1]['posy'] = "0.5847";
        $pos['second'][2]['posx'] = "0.6651";
        $pos['second'][2]['posy'] = "0.6734";
        $pos['second'][3]['posx'] = "0.4611";
        $pos['second'][3]['posy'] = "0.5426";
        $pos['second'][4]['posx'] = "0.7504";
        $pos['second'][4]['posy'] = "0.5211";
        $pos['second'][5]['posx'] = "0.3947";
        $pos['second'][5]['posy'] = "0.5444";
        $pos['second'][6]['posx'] = "0.5431";
        $pos['second'][6]['posy'] = "0.5240";
        $pos['second'][7]['posx'] = "0.3688";
        $pos['second'][7]['posy'] = "0.3909";
        $pos['second'][8]['posx'] = "0.6243";
        $pos['second'][8]['posy'] = "0.3055";
        $pos['second'][9]['posx'] = "0.6445";
        $pos['second'][9]['posy'] = "0.4478";
        $pos['second'][10]['posx'] = "0.4785";
        $pos['second'][10]['posy'] = "0.3173";
        //Third floor
        $pos['third'][0]['posx'] = "0.7465";
        $pos['third'][0]['posy'] = "0.2769";
        $pos['third'][1]['posx'] = "0.7488";
        $pos['third'][1]['posy'] = "0.4997";
        $pos['third'][2]['posx'] = "0.7374";
        $pos['third'][2]['posy'] = "0.3918";
        $pos['third'][3]['posx'] = "0.6267";
        $pos['third'][3]['posy'] = "0.3151";
        $pos['third'][4]['posx'] = "0.7092";
        $pos['third'][4]['posy'] = "0.5232";
        $pos['third'][5]['posx'] = "0.5104";
        $pos['third'][5]['posy'] = "0.2771";
        $pos['third'][6]['posx'] = "0.4846";
        $pos['third'][6]['posy'] = "0.3246";
        $pos['third'][7]['posx'] = "0.6640";
        $pos['third'][7]['posy'] = "0.6426";
        $pos['third'][8]['posx'] = "0.3750";
        $pos['third'][8]['posy'] = "0.5391";

    	foreach($request as $size => $stand) {
            $i = 0;
    		foreach($stand as  $item) {
	    		$event->stands()->create([
	    			'title'=>$item['title'], 
	    			'price'=>$item['price'], 
                    'posx'=> $pos[$size][$i]['posx'], 
                    'posy'=> $pos[$size][$i]['posy'], 
	    			'type'=> $size
	    		]);
                $i++;
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