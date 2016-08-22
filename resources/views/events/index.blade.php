@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div style="height: 400px; width: 100%;">
                {!! Mapper::render() !!}
            </div>
            <div class="event-listing">
                @foreach($events as $event) 
                    <div class="event event-listing-{{ $event->id }}" class="row">
                        <hr />
                        <h2 class="col-md-4 eventname">{{ $event->name }}</h2>
                        <p class="col-md-3">{{ $event->location }}</p>
                        <p class="col-md-3">
                            <strong>Starts:</strong> <em>{{ date('F d, Y h:iA', $event->eventstart) }}</em>  <br />
                            <strong>Ends:</strong> <em>{{ date('F d, Y h:iA',$event->eventend) }}</em> 
                        </p>
                        <a  class="col-md-2 btn btn-primary" href="/event/{{ $event->id }}" class="">Book your place</a>
                    </div>

                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
