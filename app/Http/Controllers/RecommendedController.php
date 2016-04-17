<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RecommendedController extends Controller
{
  public function getTrends()
  {
    $user_id       = Auth::user()->id;
    $user          = User::where('id', $user_id)
                         ->first();
    $schoolResults = User::where('school_name','like', '%'.$user->school_name.'%')
                         ->get();
  }


  public function getFriends()
  {
    $user_id = Auth::user()->id;
    $user    = User::where('id', $user_id)
                   ->first();
    $schoolResults = User::where('school_name','like', '%'.$user->school_name.'%')
                         ->get();
  }
}
