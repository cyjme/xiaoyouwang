<?php

namespace App\Http\Controllers;

use App\Chat;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
  public function chat(Request $request)
  {
    $user_id = Auth::user()->id;
    $chat    = new Chat();

    $chat->send_user_id = $user_id;
    $chat->user_id      = $request->friend_id;
    $chat->new          = $request->sixinneirong;
    $chat->have_read    = '0';
    $chat->save();
    return response()->json(['success']);

  }

  public function update()
  {
    $user_id = Auth::user()->id;
    $infos = Chat::where('user_id', $user_id)
                 ->where('have_read', '0')
                 ->get();
  }

}
