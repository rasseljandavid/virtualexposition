<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Event;

use Cornford\Googlmapper\Facades\MapperFacade as Mapper;

class EventsController extends Controller
{
    public function index()
    {
    	$events = Event::all();

		Mapper::map(30.3074624,-98.0336038, 
			[
				'center'=> true, 
				'marker'=>false,
				'zoom'=> 5

			]);
    	foreach($events as $event) {
    		Mapper::marker($event->latitude, $event->longtitude,
    		[
    			'eventClick' => '$(".event-listing .event").hide().parent().find(".event-listing-' . $event->id . '").slideDown()',
    			'title' => $event->name, 
    			'content' => $event->name
    		]); 
    	}

    	return view('events.index', compact('events'));
    }

    public function view(Event $event)
    {
    	$event->load('stands.user');

    	return view('events.show', compact('event'));
    }
}
