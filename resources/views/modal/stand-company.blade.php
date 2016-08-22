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
       			Interested? Learn more 
       			@foreach($stand->user->documents as $document)
       			<a download ng-click="addDocumentDownload({{ $stand->id }})" href="/documents/{{$document->path}}">
       				about us!
       			</a>
       			@endforeach
       		</p>
      </div>
    </div>
  </div>
</div>