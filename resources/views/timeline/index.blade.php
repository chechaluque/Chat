@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-lg-6">
      <form action="{{ route('status.post') }}" method="post" role="form">
        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
          <textarea name="status" rows="2" class="form-control" placeholder="What's up {{ Auth::user()->username }} ?"></textarea>
          @if($errors->has('status'))
              <span class="help-block">{{ $errors->first('status') }}</span>
          @endif
        </div>
        <button type="submit" class="btn btn-deafaul">Update status</button>
        <input type="hidden" name="_token" value="{{ Session::token() }}">
      </form>
      <hr>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-5">

    </div>
  </div>
@endsection
