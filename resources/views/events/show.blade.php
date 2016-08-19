@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        	<h1>{{$event->title }} Exposition Hall</h1>
        	<hr />
            @foreach ($event->stands as $stand)
            <div>
                <a href="/register">{{ $stand->title }}</a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
