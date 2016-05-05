@extends('layouts.main')
@section('content')
    <div class="row" style="margin-top:100px;">
        <div class="col-lg-8 col-lg-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    我收到的私信
                </div>
                <div class="panel-body">
                    <table class="table">
                        @foreach($xiaoxis as $xiaoxi)
                            <tr>
                                <td>{{$xiaoxi->name}}</td>
                                <td>{{$xiaoxi->new}}</td>
                                <td>
                                    <button class="sixin btn btn-success" data-toggle="modal" data-target="#myModal" >回复</button>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>

        </div>
    </div>


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
                    <button type="button" class="btn btn-primary fasongsixin" id="{{$xiaoxi->send_user_id}}">发送</button>
                </div>
            </div>
        </div>
    </div>


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