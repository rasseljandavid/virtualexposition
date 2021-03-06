<div class="modal fade" id="modal-{{ $stand->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content text-left">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">{{ $stand->title }} - {{ number_format($stand->price,2) }}</h4>
      </div>
      <div class="modal-body">
       		<p>Reserve this stand now and get a report of the total number of people visited your stand and the total number of people downloaded your marketing documents once the event is finished.</p>

       		<p>Click the button below and enter your details in the next page.</p>
      </div>
      <div class="modal-footer">
      	@if (Auth::guest())
      	 	<a href="/reserve/{{ $event->id }}/{{$stand->id }}" class="btn btn-primary">
      	 		Reserve
      	 	</a>
      	
      	@else
      		<a href="/stand/reserve/{{ $stand->id }}" class="btn btn-primary">
      			Reserve
      		</a>
        @endif

      </div>
    </div>
  </div>
</div>