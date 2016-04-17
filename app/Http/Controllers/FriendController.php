<?php

namespace App\Http\Controllers;

use App\Friend;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FriendController extends Controller
{
  //------------------好友管理模块
////当前用户添加好友
//Route::post('/friend/add', 'FriendController@add');
////搜索好友、用户
//Route::post('/friend/search', 'FriendController@search');
////获取当前用户的好友列表
//Route::get('/friend/getAll', 'FriendController@getAll');
////删除当前用户的某个好友
//Route::post('/friend/delete', 'FriendController@delete');
  public function add(Request $request)
  {
    $friend            = new Friend();
    $friend->user_id   = Auth::user()->id;
    $friend->friend_id = $request->user_id;
    $friend->save();
    return response()->json(['info' => 'addFriend Success']);
  }

  public function search(Request $request)
  {
    $name    = $request->name;
    $results = User::where('name', 'like', '%' . $name . '%')
                   ->get();
    return response()->json($results);
  }

  public function getAll()
  {
    $user_id = 1;
    $results = User::join('friends', 'users.id', '=', 'friends.user_id')
                   ->where('users.id', $user_id)
                   ->get();
    return response()->json($results);
  }

  public function delete(Request $request)
  {
    $friend_id = $request->friend_id;
    $user_id   = Auth::user()->id;
    $friend    = Friend::where('user_id', $user_id)
                       ->where('id', $friend_id);
    $friend->delete();
    return response()->json(['results' => 'delete success']);
  }
}
