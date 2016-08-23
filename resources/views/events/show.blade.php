@extends('layouts.app')

@section('content')
<div class="container">
	<input type="hidden" value="{{$event->id}}" id="event_id" />
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        	<div class="row">
        		<div class="col-md-6">
	        		<h1 class="no-top-margin event-title">{{ $event->name }} Exposition Hall</h1>
	        		<p class="half-bottom-margin">Address: {{ $event->location }}</p>
	        		<p class="half-bottom-margin">Date Start: <em>{{ date('F d, Y g:iA',$event->eventstart) }}</em></p>
        		</div>

	        	<div class="col-md-6 text-right">
	        		<timer finish-callback="eventfinished({{ $event->id }})" countdown="{{ $event->countdown }}" max-time-unit="'day'" interval="1000">
		        		@include('layouts/timer')
	        		</timer>
	        	</div>
        	</div>
        	<p>{{$event->body}}</p>
        	<hr />

        	<div class="exposition-hall">
        		
        		<div col-md-12>
        			<div id="mapplic"></div>
        		</div>
        	</div>
        	<hr />
        </div>
    </div>
</div>
@endsection
