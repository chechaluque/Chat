<div class="media">
  <a href="{{ route('profile', ['username'=> $user->username]) }}" class="pull-left">
    <img class="media-object" src="{{ 'https://www.gravatar.com/avatar/' . md5(strtolower(trim($user->email))). "?s=50&d=mm&s=40" }}" alt="{{ $user->username }}" />
  </a>
  <div class="media-body">
    <h4 class="media-heading"><a href="{{ route('profile', ['username'=> $user->username]) }}">{{ $user->username}}</a></h4>
    @if ($user->location)
      <p>
        {{ $user->location }}
      </p>

    @endif
  </div>
</div>
