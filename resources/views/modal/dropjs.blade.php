<!-- Modal -->
<div class="modal fade" id="dropJS" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Upload Marketing Documents</h4>
      </div>
      <div class="modal-body">
          <form method="POST" action="/files" class="dropzone" id="my-awesome-dropzone">
             {{ csrf_field() }}
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" ng-click="doneUploading()">Done!</button>
      </div>
    </div>
  </div>
</div>