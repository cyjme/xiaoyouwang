<?php

namespace App\Http\Controllers;
use App\User;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
  public function inputUserInfo()
  {
    return view('inputUserInfo');
  }

  public function index()
  {
    return view('index');
  }

  public function home()
  {
    $user = Auth::user();
    if ($user === null) {
      return redirect('/auth/login');
    }

    $user_id = Auth::user()->id;
    $user = User::where('id', $user_id)
                ->first();
    if ($user->school_name == null) {
      return redirect('/user/inputUserInfo');
    }
    return redirect('/special');
  }


  /**
   * 设置当前用户信息
   * @param Request $request
   * @return \Illuminate\Http\JsonResponse
   */
  public function updateUserInfo(Request $request)
  {

    $user_id = Auth::user()->id;
    $user               = User::find($user_id);
    $user->name         = $request->name;
    $user->school_name  = $request->school_name;
    $user->faculty      = $request->faculty;
    $user->major        = $request->major;
    $user->grade        = $request->grade;
    $user->school_year  = $request->school_year;
    $user->phone_number = $request->phone_number;
    $user->interest     = $request->interest;

    $user->save();
    return response()->json($user);

  }

  /**
   * 获取当前用户信息
   * @return \Illuminate\Http\JsonResponse
   */
  public function getInfo()
  {
    $user_id = 1;
    $user = User::find($user_id);
    return response()->json($user);
  }



}
