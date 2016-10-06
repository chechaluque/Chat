@extends('layouts.app')
@section('content')
  <h3>Update your profile</h3>
  <div class="row">
    <div class="col-lg-6">
      <form action="#" role="form" method="post" class="form-vertical">
        <div class="row">
          <div class="col-lg-6">
            <div class="form-group">
              <label for="first_name" class="control-label">First Name</label>
              <input type="text" name="first_name" id="first_name" class="form-control">
            </div>
          </div>

          <div class="col-lg-6">
            <div class="form-group">
              <label for="last_name" class="control-label">Last Name</label>
              <input type="text" name="last_name" id="last_name" class="form-control">
            </div>
          </div>

          <div class="col-lg-6">
            <div class="form-group">
              <label for="location" class="control-label">Location</label>
              <input type="text" name="location" id="location" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-default">Edit</button>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
