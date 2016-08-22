@extends('layouts.app')

@section('content')
<div class="container">

    <form class="form-horizontal" role="form" method="POST" action="{{ url('event') }}">
	    <div class="row">
	        <div class="col-md-6">
	            <h2 class="shade-blue">Event Details</h2>
	            <hr />
                {{ csrf_field() }}
                @include('form/event')
	        </div>

	        <div class="col-md-6">
	        	<h2 class="shade-blue">Stands</h2>
	        	<hr />
	            @include('form/stand')
	        </div>
	    </div>
	    <div class="form-group row">
		    <div class="col-md-6 col-md-offset-4">
		        <button type="submit" class="btn btn-primary">
		            <i class="fa fa-btn"></i> Submit
		        </button>
		    </div>
		</div>
	</form>
</div>
@endsection
