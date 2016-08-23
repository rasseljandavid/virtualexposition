<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="name" class="col-md-4 control-label">Company Name</label>

    <div class="col-md-6">
        <input ng-model="name" id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
    <label for="logo" class="col-md-4 control-label">Company Logo</label>

    <div class="col-md-6">
        <input type="file" name="logo"  fileread="logo" />

        @if ($errors->has('logo'))
            <span class="help-block">
                <strong>{{ $errors->first('logo') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
    <label for="phone" class="col-md-4 control-label">Contact</label>

    <div class="col-md-6">
        <input ng-model="phone" id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}">

        @if ($errors->has('phone'))
            <span class="help-block">
                <strong>{{ $errors->first('phone') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

    <div class="col-md-6">
        <input ng-model="email" id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    <label for="password" class="col-md-4 control-label">Password</label>

    <div class="col-md-6">
        <input ng-model="password" id="password" type="password" class="form-control" name="password">

        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
    <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

    <div class="col-md-6">
        <input  ng-model="password_confirmation" id="password-confirm" type="password" class="form-control" name="password_confirmation">

        @if ($errors->has('password_confirmation'))
            <span class="help-block">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
            </span>
        @endif
        <span class="help-block help-block-error" id="help-block-error">
           
        </span>
    </div>
</div>



<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="button" class="btn btn-primary" ng-click="registerUser()">
            <i class="fa fa-btn fa-user"></i> Register
        </button>
    </div>
</div>