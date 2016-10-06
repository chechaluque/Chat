@extends('layouts.app')
@section('content')
  <h3>Your search for "{{ Request::input('query') }}"</h3>
  @if (!$users->count())
    <p>
      No result found, sorry.
    </p>
  @else
    <div class="row">
      <div class="col-lg-12">
        @foreach ($users as $user)
          @include('user.partial.user')
        @endforeach

      </div>
    </div>
  @endif
@endsection
