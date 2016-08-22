<div class="form-group">
    <label for="location" class="col-md-2 control-label">Title</label>

    <div class="col-md-6">
        <input type="text" class="form-control" name="stands[large][{{$i}}][title]" value="{{ env('STAND_LARGE_DEFAULT_TITLE') }}">
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Price</label>

    <div class="col-md-6">
        <input type="text" class="form-control" name="stands[large][{{$i}}][price]" value="{{ env('STAND_LARGE_DEFAULT_PRICE') }}">
    </div>
</div>