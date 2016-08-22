<div class="modal fade" id="modal-{{ $stand->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">{{ $stand->user->name }}</h4>
      </div>
      <div class="modal-body company">
      	<div class="row">
      		<div class="col-md-6">
      			@if($stand->user->email)
      			<p><i class="fa fa-envelope" aria-hidden="true"></i> {{ $stand->user->email }}</p>
      			@endif
      			
      			@if($stand->user->phone)
      			<p><i class="fa fa-phone" aria-hidden="true"></i> {{ $stand->user->phone }}</p>
       			@endif

       			@if(count($stand->user->documents) > 0)
	       		<p>
	       			Interested? Learn more by downloading the documents below.
	       		</p>
	       		<ul> 
	       			@foreach($stand->user->documents as $document)
	       			<li><a download ng-click="addDocumentDownload({{ $stand->id }})" href="/documents/{{$document->path}}">
	       				{{$document->path}}
	       			</a>
	       			</li>
	       			@endforeach
	       		</ul>
	       		@endif
      		</div>

      		<div class="col-md-6">
      			<img class="img-responsive" src="/images/logo/{{$stand->user->logo ?: "default.png"}}">
      		</div>
      	</div>
       		
      </div>
    </div>
  </div>
</div>