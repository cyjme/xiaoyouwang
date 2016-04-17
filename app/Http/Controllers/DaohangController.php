<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DaohangController extends Controller
{
  public function special()
  {
    return view('special');
  }

  public function school()
  {
    return view('school');
  }

  public function friends()
  {
    return view('friends');
  }

  public function myFriends()
  {
    return view('myFriends');
  }
}
