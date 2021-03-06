@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="shade-blue">Register or login to Reserver the {{ $stand->title }} of {{ $event->name }}</h1>
    <hr />
    <div class="row reserve">
         <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                
                    <form class="form-horizontal login-form" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
                          <input ng-init="stand_id={{$stand->id}}"  ng-model="stand_id" type="hidden" name="stand_id" value="{{$stand->id}}" />
                        <input ng-init="event_id={{$stand->event_id}}"  ng-model="event_id" type="hidden" name="event_id" value="{{$stand->event_id}}" />
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

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
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Password?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form enctype="multipart/form-data" class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}
                        <input ng-init="stand_id={{$stand->id}}"  ng-model="stand_id" type="hidden" name="stand_id" value="{{$stand->id}}" />
                        <input ng-init="event_id={{$stand->event_id}}"  ng-model="event_id" type="hidden" name="event_id" value="{{$stand->event_id}}" />
                        @include('form/register')
                    </form>

                    @include('modal/dropjs')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
