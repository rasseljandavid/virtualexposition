<div class="form-group">
    <label for="location" class="col-md-2 control-label">Title</label>

    <div class="col-md-6">
        <input type="text" class="form-control" name="stands[ground][{{$i}}][title]" value="{{ config('stand.stand_large_default_title') }}">
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Price</label>

    <div class="col-md-6">
        <input type="text" class="form-control" name="stands[ground][{{$i}}][price]" value="{{ config('stand.stand_large_default_price') }}">
    </div>
</div>