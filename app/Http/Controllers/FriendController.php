<?php

namespace Chat\Http\Controllers;

use Illuminate\Http\Request;

use Chat\Http\Requests;
use Auth;
use Chat\User;
class FriendController extends Controller
{
    public function getFriend()
    {
      $friends = Auth::user()->friends();
      $requests = Auth::user()->friendsRequests();
      return view('friends.index')
      ->with('friends', $friends)
      ->with('requests', $requests);
    }
    public function getAdd($username)
    {
      $user = User::where('username', $username)->first();
      if(!$user){
        return redirect()->route('home')->with('info', 'That user could not be found.');
      }
      if (Auth::user()->id === $user->id) {
        return redirect()->route('home');
      }
      if(Auth::user()->hasFriendRequestPending($user) ||
      $user->hasFriendRequestPending(Auth::user())){
        return redirect()->route('profile.index', ['username' => $user->username])
        ->with('info', 'Friend request already pending.');
      }
      if (Auth::user()->isFriendWith($user)) {
        return redirect()->route('profile', ['username' => $user->username])
        ->with('info', 'You are already friends.');
      }

      Auth::user()->addFriend($user);
      return redirect()->route('profile', ['username'=> $username])
      ->with('info', 'Friend request sent.');
    }
    public function getAccept($username)
    {
      $user = User::where('username', $username)->first();
      if(!$user){
        return redirect()->route('home')->with('info', 'That user could not be found.');
      }
      if (!Auth::user()->hasFriendRequestRecived($user)) {
        return redirect()->route('home');
      }
      Auth::user()->acceptFriendRequest($user);
      return redirect()->route('profile', ['username'=> $username])
      ->with('info', 'Friend request accepted.');
    }

}
