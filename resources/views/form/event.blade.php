<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="name" class="col-md-4 control-label">Event Name</label>

    <div class="col-md-6">
        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>



<div class="form-group{{ $errors->has('eventstart') ? ' has-error' : '' }}">
    <label for="eventstart" class="col-md-4 control-label">Event Start</label>

    <div class="col-md-6">
        <div class="dropdown">
            <a class="dropdown-toggle" id="dropdown" role="button" data-toggle="dropdown" data-target="#" href="#">
                <div class="input-group">
                    <input type="text" class="form-control" name="eventstart" value="{{ old('eventstart') }}" data-ng-model="data.dateDropDownInput">
                    <span class="input-group-addon">
                        <i class="glyphicon glyphicon-calendar"></i>
                    </span>
                </div>
             </a>
            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                <datetimepicker data-ng-model="data.dateDropDownInput" data-datetimepicker-config="{ dropdownSelector: '#dropdown' }"/>
            </ul>
        </div>

        @if ($errors->has('eventstart'))
            <span class="help-block">
                <strong>{{ $errors->first('eventstart') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('eventend') ? ' has-error' : '' }}">
    <label for="eventend" class="col-md-4 control-label">Event End</label>

    <div class="col-md-6">
        <div class="dropdown">
            <a class="dropdown-toggle" id="dropdown2" role="button" data-toggle="dropdown" data-target="#" href="#">
                <div class="input-group">
                    <input type="text" class="form-control" name="eventend" value="{{ old('eventend') }}" data-ng-model="data.dateDropDownInput2">
                    <span class="input-group-addon">
                        <i class="glyphicon glyphicon-calendar"></i>
                    </span>
                </div>
             </a>
            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                <datetimepicker data-ng-model="data.dateDropDownInput2" data-datetimepicker-config="{ dropdownSelector: '#dropdown2' }"/>
            </ul>
        </div>


        @if ($errors->has('eventend'))
            <span class="help-block">
                <strong>{{ $errors->first('eventend') }}</strong>
            </span>
        @endif
    </div>
</div>


<div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
    <label for="body" class="col-md-4 control-label">Event Description</label>

    <div class="col-md-6">
    <textarea cols="10" rows="5" class="form-control" name="body">{{ old('body') }}</textarea>
        @if ($errors->has('body'))
            <span class="help-block">
                <strong>{{ $errors->first('body') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
    <label for="location" class="col-md-4 control-label">Location</label>

    <div class="col-md-6">
        <input id="location" data-geo="formatted_address" value="" type="text" class="form-control" name="location" value="{{ old('location') }}">

        @if ($errors->has('location'))
            <span class="help-block">
                <strong>{{ $errors->first('location') }}</strong>
            </span>
        @endif
    </div>
</div>
  <div class="col-md-6 col-md-offset-4">
                <div style="height: 200px; width: 100%;" id="map-canvas-0"></div>
</div>

        <input id="latitude" data-geo="lat" type="hidden" name="latitude" />
        <input id="longtitude" data-geo="lng" type="hidden" name="longtitude" />

        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?v=3.exp&region=GB&language=en-gb&key=AIzaSyAtqWsq5Ai3GYv6dSa6311tZiYKlbYT4mw&signed_in=false&libraries=places"></script>
