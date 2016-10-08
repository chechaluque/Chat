@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-lg-5">
      @include('user.partial.user')
      <hr>

    </div>
    <div class="col-lg-4 col-lg-offset-3">
      @if (Auth::user()->hasFriendRequestPending($user))
        <p>
          Waiting for {{ $user->username }} to accept your request.
        </p>
      @elseif (Auth::user()->hasFriendRequestRecived($user))
        <a href="{{ route('firends.accept', ['username'=>$user->username]) }}" class="btn btn-primary">Accept friend</a>
      @elseif (Auth::user()->isFriendWith($user))

        <p>
          You and {{ $user->username }} are friends.
        </p>

      @elseif (Auth::user()->id !== $user->id)
        <a href="{{ route('firends.add', ['username'=>$user->username]) }}" class="btn btn-primary">Add as friends.</a>
      @endif
      <h4>{{ $user->username }}'s friends</h4>
      @if (!$user->friends()->count())
        <p>
          {{ $user->first_name .' '. $user->last_name }} has no friends.
        </p>
      @else
        @foreach ($user->friends() as $user)
          @include('user.partial.user')
        @endforeach
      @endif
    </div>
  </div>
@endsection
