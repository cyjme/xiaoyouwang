@extends('layouts.main')
@section('content')
    <div class="row">
        我的好友
    </div>
        <table class="table table-striped" id="friendtable">

            @foreach($friends as $friend)
                <tr id="{{$friend->friend_id}}tr">
                    <td>
                        <div class="row">
                            <div class="col-lg-1">
                                <img src="/touxiang/{{$friend->avator_url}}.png" alt="用户头像">
                            </div>
                            <div class="col-lg-4">
                                <div class="row">
                                    <span style="font-family: 'Microsoft Yahei'; font-weight: bold; margin-right: 20px;">{{$friend->name}}</span>({{$friend->gexingqianming}})
                                </div>
                                <div class="row" style="margin-top: 10px;">
                                    {{$friend->school_name}}
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <a href="/user/getInfo/{{$friend->friend_id}}"><button class="btn btn-info" >更多资料</button></a>
                            </div>
                            <div class="col-lg-2">
                                <button class="shanchu btn btn-danger" id="{{$friend->friend_id}}">删除好友</button>
                            </div>
                            <hr>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>


    <script>
        $(function(){
            $(".shanchu").click(function(){
                var friend_id = $(this).attr('id');
                $.ajax({
                    type:'POST',
                    url:'/friend/delete',
                    data: {friend_id:friend_id},
                    success:function(){
                        alert("删除好友成功");
                        var dom = '#'.concat(friend_id).concat('tr');
                        $(dom).remove();
                    },
                    error:function(msg){
                        alert(msg)
                    }
                });
            });
        });
    </script>
@endsection