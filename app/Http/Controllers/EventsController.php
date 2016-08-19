<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Event;

class EventsController extends Controller
{
    public function index()
    {
    	$events = Event::all();

    	return view('events.index', compact('events'));
    }

    public function view(Event $event)
    {
    	$event->load('stands');
    	
    	return view('events.show', compact('event'));
    }
}
