<div class="form-group">
    <label class="col-md-2 control-label">Title</label>

    <div class="col-md-6">
        <input type="text" class="form-control" name="stands[third][{{$i}}][title]" value="{{ config('stand.stand_small_default_title') }}">
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Price</label>

    <div class="col-md-6">
        <input type="text" class="form-control" name="stands[third][{{$i}}][price]" value="{{ config('stand.stand_small_default_price') }}">
    </div>
</div>