@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        	<h1>{{ $event->name }} Exposition Hall</h1>
        	<hr />
            @foreach ($event->stands as $stand)
            <div style="margin: 20px;">
            	@if ($stand->user)
            		<h2>
            			{{$stand->user->name}}
            		</h2>
            	@else
            		<h2>
            			{{$stand->price}}
            		</h2>
            		<p>
            			Free
            		</p>
            	@endif
                <a href="/register">{{ $stand->title }}</a>
            	
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
