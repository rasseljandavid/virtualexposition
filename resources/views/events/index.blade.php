@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @foreach ($events as $event)
            <div>
                <a href="/event/{{ $event->id }}">{{ $event->name }}</a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
