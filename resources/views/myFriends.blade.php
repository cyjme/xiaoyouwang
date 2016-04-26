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
                                <img src="{{$friend->avator_url}}" alt="用户头像">
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
                            <div class="col-lg-2">
                                <button class="sixin btn btn-success" data-toggle="modal" data-target="#myModal" >发私信</button>
                            </div>
                            <hr>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel" >发私信</h4>
                </div>
                <div class="modal-body">
                    <textarea class="form-control" id="sixinneirong" style="height:200px;"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="button" class="btn btn-primary fasongsixin" id="{{$friend->friend_id}}">发送</button>
                </div>
            </div>
        </div>
    </div>


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


    <script>
        $(function(){
            $(".fasongsixin").click(function(){
                var friend_id = $(this).attr('id');
                var sixinneirong = $('#sixinneirong').val();
                $.ajax({
                    type:'POST',
                    url:'/chat',
                    data: {friend_id:friend_id,sixinneirong:sixinneirong},
                    success:function(){
                        alert('发送成功');
                    },
                    error:function(){
                        alert('发送失败');
                    }
                });
            });
        });
    </script>
@endsection