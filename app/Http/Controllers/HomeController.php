<?php

namespace Chat\Http\Controllers;

use Illuminate\Http\Request;

use Chat\Http\Requests;

class HomeController extends Controller
{
    public function index()
    {
      return view("welcome");
    }
}
