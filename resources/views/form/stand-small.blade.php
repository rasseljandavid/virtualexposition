<div class="form-group">
    <label class="col-md-2 control-label">Title</label>

    <div class="col-md-6">
        <input type="text" class="form-control" name="stands[small][{{$i}}][title]" value="{{ env('STAND_SMALL_DEFAULT_TITLE') }}">
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Price</label>

    <div class="col-md-6">
        <input type="text" class="form-control" name="stands[small][{{$i}}][price]" value="{{ getenv('STAND_SMALL_DEFAULT_PRICE') }}">
    </div>
</div>