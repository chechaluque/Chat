<?php

namespace Chat;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'first_name',
        'last_name',
        'location',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    // public function getAvatarUrl()
    // {
    //   return "https://www.gravatar.com/avatar/{{ md5($this->email) }}?d=mm&s";
    // }
    public function statuses()
    {
      return $this->hasMany('Chat\Status', 'user_id');
    }
    public function friendsOfMine()
    {
      return $this->belongsToMany('Chat\User', 'friends', 'user_id', 'friend_id');
    }
    public function friendsOf()
    {
      return $this->belongsToMany('Chat\User', 'friends', 'friend_id', 'user_id');
    }
    public function friends()
    {
      return $this->friendsOfMine()->wherePivot('accepted', true)->get()
      ->merge($this->friendsOf()->wherePivot('accepted', true)->get());
    }
    public function friendsRequests()
    {
      return $this->friendsOfMine()->wherePivot('accepted', false)->get();
    }
    public function friendRequestPending()
    {
      return $this->friendsOf()->wherePivot('accepted', false)->get();
    }
    public function hasFriendRequestPending(User $user)
    {
      return (bool) $this->friendRequestPending()->where('id', $user->id)->count();
    }
    public function hasFriendRequestRecived(User $user)
    {
      return (bool) $this->friendsRequests()->where('id', $user->id)->count();
    }
    public function addFriend(User $user)
    {
     $this->friendsOf()->attach($user->id, ['accepted'=>0]);
    }
    public function acceptFriendRequest(User $user)
    {
      $this->friendsRequests()->where('id', $user->id)->first()->pivot->update([
        'accepted' => true,
      ]);
    }
    public function isFriendWith(User $user)
    {
      return (bool) $this->friends()->where('id', $user->id)->count();
    }
}
