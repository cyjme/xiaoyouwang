<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Trend;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TrendController extends Controller
{
//  获取校友动态
  public function getSchool()
  {

//    $user        = Auth::user();
//    $school_name = $user->school_name;
//    $users       = User::where('school_name', $school_name)
//                       ->get();
//
//    foreach ($users as $user) {
//      $user->id;
//      $trend['touxiangUrl'] = $user->avator_url;
//      $trend['name']= $user->name;
//      $trend['qianMing']= $user->gexingqianming;
//
//    }

    //用于存储动态的数组
    $array  = [];
    $trends = Trend::join('users', 'user_id', '=', 'users.id')
                   ->select('avator_url', 'name', 'gexingqianming',
                     'trends.created_at', 'content', 'imageUrl', 'trends.id', 'agreeNumber')->orderBy('created_at', 'desc')->get();
    for ($i = 0; $i < count($trends); $i++) {
      $a         = $trends[$i];
      $trend_id  = $a->id;
      $comments  = Comment::join('users', 'user_id', '=', 'users.id')
                          ->where('trend_id', $trend_id)
                          ->select('commentContent', 'name AS userName')
                          ->get();
      $array[$i] = [
        'touXiangUrl' => $a->avator_url,
        'name'        => $a->name,
        'qianMing'    => $a->gexingqianming,
        'time'        => $a->created_at->toTimeString(),
        'content'     => $a->content,
        'imageUrl'    => $a->imageUrl,
        'trendId'     => $a->id,
        'agree'       => $a->agreeNumber,
        'comments'    => $comments,
        'commentNumber'=>count($comments)
      ];
    }


    return response()->json(['trends' => $array]);


  }

  public function put()
  {
    return view('PutTrend');
  }

  public function post(Request $request)
  {
    $user_id          = Auth::user()->id;
    $trend            = new Trend();
    $trend['user_id'] = $user_id;
    $trend['content'] = $request->trend;

    if ($request->hasFile('image')) {
      $fileName = uniqid();
      $path     = 'trendImage/';
      $request->file('image')->move($path, $fileName . '.png');
      $imageUrl          = '/trendImage/' . $fileName . '.png';
      $trend['imageUrl'] = $imageUrl;
      $trend->save();
    }
    return redirect('/school');
  }


  public function putComment(Request $request)
  {
    $comment                 = new Comment();
    $comment->trend_id       = $request->trendId;   //获取动态id
    $comment->commentContent = $request->commentText;  //获取 评论内容
    $comment->user_id        = Auth::user()->id;   //当前的用户id
    $comment->save();                         //保存评论

    return response()->json(['success']);    // 返回 成功的状态.
  }

  public function agree(Request $request)
  {
    $trend              = Trend::where('id', $request->trendId)->first();
    $trend->agreeNumber = $trend->agreeNumber + 1;
    $trend->save();
    return response()->json(['success']);
  }
}
