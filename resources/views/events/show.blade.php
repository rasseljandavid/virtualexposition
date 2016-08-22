@extends('layouts.app')

@section('content')
<div class="container">
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
        		<div class="row large">
        			@foreach ($stands['large'] as $stand)
        				<div class="col-md-4">
        				@unless ($stand->user_id)
        					<h2 class="price shade-blue">
			        			<a href="#"  data-toggle="modal" data-target="#modal-{{ $stand->id }}">
			        				{{number_format($stand->price, 2)}}
			        			</a>
		        			</h2>
		        			<a href="#"  data-toggle="modal" data-target="#modal-{{ $stand->id }}">
		        				<img src="/images/large_stand_empty.png" / >
		        			</a>
		        			@include('modal/stand-free')
			        	@else 
			        		<h2 class="company-name no-top-margin">
			        			<a ng-click="addStandVisit({{ $stand->id }})" href="#"  data-toggle="modal" data-target="#modal-{{ $stand->id }}">
			        				<img class="logo" src="/images/logo/{{$stand->user->logo ?: "default.png"}}">
			        			</a>
			        		</h2>
			        		<a ng-click="addStandVisit({{ $stand->id }})" href="#"  data-toggle="modal" data-target="#modal-{{ $stand->id }}">
		        				<img src="/images/large_stand.png" / >
		        			</a>
		        			@include('modal/stand-company')
			        	@endif
			        	</div>
	        		@endforeach
        		</div>

        		<div class="row medium">
        			@foreach ($stands['medium'] as $stand)
	        		<div class="col-md-3">
	        			@unless ($stand->user_id)
		        			<h2 class="price shade-blue">
		        				<a href="#"  data-toggle="modal" data-target="#modal-{{ $stand->id }}">
			        				{{number_format($stand->price,2)}}
			        			</a>
			        		</h2>
		        			<a href="#"  data-toggle="modal" data-target="#modal-{{ $stand->id }}">
		        				<img src="/images/medium_stand_empty.png" / >
		        			</a>
		        			@include('modal/stand-free')
			        	@else 
			        		<h2 class="company-name no-top-margin">
			        			<a ng-click="addStandVisit({{ $stand->id }})" href="#"  data-toggle="modal" data-target="#modal-{{ $stand->id }}">
			        				<img class="logo" src="/images/logo/{{$stand->user->logo ?: "default.png"}}">
			        			</a>
			        		</h2>
			        		<a ng-click="addStandVisit({{ $stand->id }})" href="#"  data-toggle="modal" data-target="#modal-{{ $stand->id }}">
		        				<img src="/images/medium_stand.png" / >
		        			</a>
		        			@include('modal/stand-company')
			        	@endif
	        		</div>
	        		@endforeach
        		</div>

        		<div class="row small">
        			@foreach ($stands['small'] as $stand)
	        		<div class="col-md-2">
	        			@unless ($stand->user_id)
		        			<h2 class="price shade-blue">
		        				<a href="#"  data-toggle="modal" data-target="#modal-{{ $stand->id }}">
		        					{{number_format($stand->price,2)}}
		        				</a>
		        			</h2>

		        			<a href="#"  data-toggle="modal" data-target="#modal-{{ $stand->id }}">
		        				<img src="/images/small_stand_empty.png" / >
		        			</a>

		        			@include('modal/stand-free')
			        	@else 
			        		<h2 class="company-name no-top-margin">
			        			<a ng-click="addStandVisit({{ $stand->id }})" href="#"  data-toggle="modal" data-target="#modal-{{ $stand->id }}">
			        				<img class="logo" src="/images/logo/{{$stand->user->logo ?: "default.png"}}">
			        			</a>
			        		</h2>
			        		<a ng-click="addStandVisit({{ $stand->id }})" href="#"  data-toggle="modal" data-target="#modal-{{ $stand->id }}">
		        				<img src="/images/small_stand.png" / >
		        			</a>

		        			@include('modal/stand-company')
			        	@endif
	        		</div>
	        		@endforeach
        		</div>
        	</div>
        	<hr />
        </div>
    </div>
</div>
@endsection
