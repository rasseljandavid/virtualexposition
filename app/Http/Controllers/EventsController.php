<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Event;

use Cornford\Googlmapper\Facades\MapperFacade as Mapper;

use Mail;

class EventsController extends Controller
{
    public function index()
    {
    	//Get the events that are not ended yet
    	$events = Event::where('eventend', '>', time())->get();

		Mapper::map(30.3074624,-98.0336038, 
			[
				'center'=> true, 
				'marker'=>false,
				'zoom'=> 2

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
    	$event->countdown = $event->eventend - time();

    	//Add a finish date here

    	return view('events.show', compact('event'));
    }

    public function sendreport(Request $request)
    {
    	$input = $request->all();
    	$event = Event::find($input['id']);
    	//loan the stands and the user
    	$event->load('stands.user');

    	foreach($event->stands as $stand) {

    		if($stand->user_id) {
    			$data = [
    				'title' => $stand->title,
    				'body'  => $stand->body,
    				'price' => $stand->price,
    				'totalVisit' => $stand->totalVisit,
    				'totalDownload' => $stand->totalDownload,
    			];
    			$companyName = $stand->user->name;
    			$companyEmail = $stand->user->email;

				Mail::send('emails.report', $data, function ($message)  use ($companyEmail) {
					$message->from('support@virtualexposition.com', 'Virtual Exposition');
					$message->to($companyEmail);
				});
			}
		}
    	
    	return $event;
    }
}
