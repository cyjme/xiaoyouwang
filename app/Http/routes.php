<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'UserController@home');
Route::get('/home', 'UserController@home');
Route::get('/index', 'UserController@index');

Route::get('/test',function(){
  return 'test';
});


//----------------------导航栏路由
//特别推荐
Route::get('/special', 'DaohangController@special');
//校友动态
Route::get('/school','DaohangController@school');
//好友动态
Route::get('/friends','DaohangController@friends');
//我的好友
Route::get('myFriends','DaohangController@myFriends');

// 认证路由...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
// 注册路由...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');



//------------------用户管理模块
//登录后跳转，填写个人信息
Route::get('/user/inputUserInfo', 'UserController@inputUserInfo');
//提交用户信息
Route::post('/home/updateUserInfo/{id}','UserController@updateUserInfo');
//获取用户信息
Route::get('/user/getInfo/{id}', 'UserController@getInfo');


//TODO

//------------------好友管理模块
//当前用户添加好友
Route::post('/friend/add', 'FriendController@add');
//搜索好友、用户
Route::post('/friend/search', 'FriendController@search');
//获取当前用户的好友列表
Route::get('/friend/getAll', 'FriendController@getAll');
//删除当前用户的某个好友
Route::post('/friend/delete', 'FriendController@delete');



//-------------------动态分享模块
//发表评论
Route::post('/trend/putComment','TrendController@putComment');
//发表动态
Route::get('/trend/put', 'TrendController@put');
Route::post('/trend/post', 'TrendController@post');
//删除动态
Route::post('/trend/delete', 'TrendController@delete');
//获取好友动态
Route::get('/trend/getFriends','TrendController@getFrinends');
//获取校友动态
Route::get('/trend/getSchool', 'TrendController@getSchool');
//点赞动作
Route::post('/trend/agree', 'TrendController@agree');
//评论动作
Route::post('/trend/comment', 'TrendController@comment');
//获取点赞人数
Route::post('/trend/getAgreesNumber', 'TrendController@getAgreesNumber');
//获取评论内容
Route::post('/trend/getComments', 'TrendController@getComments');



//-------------------系统推荐模块
//获取推荐的动态
Route::get('/recommend/getTrends','RecommendedController@getTrends');
//获取推荐的好友
Route::get('/recommend/getFriends', 'RecommendedController@getFriends');


//-------------------私信聊天模块
//发出私信内容
Route::post('/chat', 'ChatController@chat');
//获取未读消息的数量
Route::get('/chat/getNumber', 'ChatController@getNumber');
Route::get('/chat/all','ChatController@xiaoxi');

//-------------------网站管理模块
Route::get('/admin', 'AdminController@login');
//添加管理员
Route::post('/admin/add', 'AdminController@add ');
//删除管理员
Route::post('/admin/delete', 'AdminController@delete ');
//删除用户
Route::post('/admin/deleteUser', 'AdminController@deleteUser');
//添加学校列表
Route::post('/admin/addSchool', 'AdminController@addSchool');
//删除学校列表
Route::post('/admin/deleteSchool', 'AdminController@deleteSchool ');
//发布系统通知
Route::post('/admin/publishNotice', 'AdminController@publishNotice ');
//删除系统通知
Route::post('/admin/deleteNotice','AdminController@deleteNotice');

