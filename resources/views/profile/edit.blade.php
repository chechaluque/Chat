@extends('layouts.app')
@section('content')
  <h3>Update your profile</h3>
  <div class="row">
    <div class="col-lg-6">
      <form action="{{ route('profile.edit') }}" role="form" method="post" class="form-vertical">
        <div class="row">
          <div class="col-lg-6">
            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
              <label for="first_name" class="control-label">First Name</label>
              <input type="text" value="{{Request::old('first_name') ? : Auth::user()->first_name }}" name="first_name" id="first_name" class="form-control">
              @if($errors->has('first_name'))
                  <span class="help-block">{{ $errors->first('first_name') }}</span>
              @endif
            </div>
          </div>

          <div class="col-lg-6">
            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
              <label for="last_name" class="control-label">Last Name</label>
              <input type="text" value="{{Request::old('last_name') ? : Auth::user()->last_name }}" name="last_name" id="last_name" class="form-control">
              @if($errors->has('last_name'))
                  <span class="help-block">{{ $errors->first('last_name') }}</span>
              @endif
            </div>
          </div>

          <div class="col-lg-6">
            <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
              <label for="location" class="control-label">Location</label>
              <input type="text" value="{{ Request::old('location') ? : Auth::user()->location }}" name="location" id="location" class="form-control">
              @if($errors->has('location'))
                  <span class="help-block">{{ $errors->first('location') }}</span>
              @endif
            </div>
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-default">Edit</button>
            <input type="hidden" name="_token" value="{{ Session::token() }}">
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
