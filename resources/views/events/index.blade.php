@extends('layouts.app')

@section('content')
<% val %>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div style="height: 400px; width: 100%;">
                {!! Mapper::render() !!}
            </div>
            <hr />
            <div class="event-listing">
                @foreach($events as $event) 
                    <div class="event event-listing-{{ $event->id }}">
                        <h2>{{ $event->name }}</h2>
                        <p>{{ $event->location }}</p>
                        <p>{{ $event->eventdate }}</p>
                        <a href="/event/{{ $event->id }}" class="btn btn-primary">Book your place</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
