<?php

namespace Chat\Http\Controllers;

use Illuminate\Http\Request;
use Chat\User;
use Chat\Http\Requests;

class ProfileController extends Controller
{
    public function getProfile($username)
    {
      $user = User::where('username', $username)->first();
      if (!$user) {
        abort(404);
      }
      return view('profile.index')->with('user', $user);
    }
    public function getEdit()
    {
      return view('profile.edit');
    }

}
