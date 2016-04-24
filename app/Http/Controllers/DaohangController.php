<?php

namespace App\Http\Controllers;

use App\Friend;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DaohangController extends Controller
{
  public function special()
  {
    $user = $this->getUser();
    $sameSchools  = User::where('school_name', 'like', $user->school_name)
                       ->get();
    $sameFacultys = User::where('faculty', 'like', $user->faculty)
                       ->get();

    $sameGrades = User::where('grade', 'like', $user->grade)
                     ->get();

    return view('special',compact('sameSchools','sameFacultys','sameGrades'));
  }

  public function school()
  {


    return view('school');
  }

  public function friends()
  {
    $user_id = Auth::user()->id;
    $results = User::join('friends', 'users.id', '=', 'friends.user_id')
                   ->where('users.id', $user_id)
                   ->get();
    dd($results);

    return view('friends');
  }

  public function myFriends()
  {
    $user_id = Auth::user()->id;
    $friends = Friend::join('users', 'friend_id', '=', 'users.id')
                   ->where('friends.user_id', $user_id)
                   ->get();

    return view('myFriends',compact('friends'));
  }

  public function getUser()
  {
    $user_id     = Auth::user()->id;
    $user        = User::where('id', $user_id)
                       ->first();
    return $user;
  }
}
