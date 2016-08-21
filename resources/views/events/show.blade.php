@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        	<h1>{{ $event->name }} Exposition Hall </h1>
        	<timer finish-callback="eventfinished({{ $event->id }})" countdown="{{ $event->countdown }}" max-time-unit="'day'" interval="1000">
        		<%days%> day<%dayS%>,
	        	<%hours%> hour<%hourS%>,
	        	<%mminutes%> minute<%minutesS%>,
	        	<%sseconds%> second<%secondsS%>
        	</timer>

            @foreach ($event->stands as $stand)
            <div style="margin: 20px;">
            	@if ($stand->user)
            		<h2>
            			{{$stand->user->name}}
            		</h2>

            		

            		<a ng-click="addStandVisit({{ $stand->id }})" href="#"  data-toggle="modal" data-target="#modal-{{ $stand->id }}">{{ $stand->title }}
            		</a>

            		<!-- Modal -->
					<div class="modal fade" id="modal-{{ $stand->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        <h4 class="modal-title" id="myModalLabel">{{ $stand->user->name }}</h4>
					      </div>
					      <div class="modal-body">
					       		<p>{{ $stand->user->phone }}</p>
					       		<p>{{ $stand->user->email }}</p>
					       		<p>
					       			Interested? Learn more <a ng-click="addDocumentDownload({{ $stand->id }})" href="">about us!</a>
					       		</p>
					      </div>
					    </div>
					  </div>
					</div>
            	@else
            		<h2>
            			{{$stand->price}}
            		</h2>
            		<p>
            			Free
            		</p>
            		<a href="#"  data-toggle="modal" data-target="#modal-{{ $stand->id }}">{{ $stand->title }}</a>

					<!-- Modal -->
					<div class="modal fade" id="modal-{{ $stand->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        <h4 class="modal-title" id="myModalLabel">{{ $stand->title }}</h4>
					      </div>
					      <div class="modal-body">
					       		<p>{{ $stand->body }}</p>
					       		<p>{{ $stand->price }}</p>
					      </div>
					      <div class="modal-footer">
					        <a href="/reserve/{{ $event->id }}/{{$stand->id }}" class="btn btn-primary">Reserve</a>
					      </div>
					    </div>
					  </div>
					</div>
            	@endif
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
