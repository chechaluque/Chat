<?php

namespace Chat\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Chat\Http\Requests;
use Chat\User;

class SearchController extends Controller
{
  public function getResult(Request $request)
  {
    $query = $request->input('query');
    if(!$query){
      return redirect()->route('home');
    }
    $users = User::where(DB::raw("CONCAT(first_name, ' ', last_name)"),
    'LIKE', "%{$query}%")
    ->orWhere('username', 'LIKE', "%{$query}%")
    ->get();

    return view('search.result')->with('users', $users);
  }
}
