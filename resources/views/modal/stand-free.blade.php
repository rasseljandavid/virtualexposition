<div class="modal fade" id="modal-{{ $stand->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content text-left">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							        <h4 class="modal-title" id="myModalLabel">{{ $stand->title }}</h4>
							      </div>
							      <div class="modal-body">
							       		<p>{{ $stand->type }}</p>
							       		<p>{{ $stand->price }}</p>
							      </div>
							      <div class="modal-footer">
							        <a href="/reserve/{{ $event->id }}/{{$stand->id }}" class="btn btn-primary">Reserve</a>
							      </div>
							    </div>
							  </div>
							</div>