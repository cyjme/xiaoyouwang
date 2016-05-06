@extends('layouts.main')
@section('content')
    <div class="special">
        <div class="row">
            <h1>您可能认识的人。</h1>
        </div>
        <div class="col-lg-8 col-lg-offset-2">

        <div class="row">
            <h2>这些朋友和您是一个学校的</h2>
        </div>

        @foreach($sameSchools as $sameSchool)
            <div class="row" style="margin-top: 30px;">
                <div class="col-lg-1">
                    <img src="{{$sameSchool->avator_url}}" alt="用户头像">
                </div>
                <div class="col-lg-7">
                    <div class="row">
                        <span style="font-family: 'Microsoft Yahei'; font-weight: bold; margin-right: 20px;">{{$sameSchool->name}}</span>({{$sameSchool->gexingqianming}})
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        {{$sameSchool->school_name}}
                    </div>
                </div>
                <div class="col-lg-2">
                    <button class="btn btn-info" data-toggle="tooltip" data-placement="left" title="请添加为好友后查看更多资料">更多资料</button>
                </div>
                <div class="col-lg-2">
                    <button class="addFriend btn btn-success btn-sm" value={{$sameSchool->id}}>加好友</button>
                </div>
            </div>
            <hr>
        @endforeach


        <div class="row">
            <h2>这些朋友和您是同一个院系</h2>
        </div>
        @foreach($sameFacultys as $sameFaculty)
            <div class="row" style="margin-top: 30px;">
                <div class="col-lg-1">
                    <img src="{{$sameFaculty->avator_url}}" alt="用户头像">
                </div>
                <div class="col-lg-7">
                    <div class="row">
                        <span style="font-family: 'Microsoft Yahei'; font-weight: bold; margin-right: 20px;">{{$sameFaculty->name}}</span>({{$sameFaculty->gexingqianming}})
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        {{$sameFaculty->school_name}}
                    </div>
                </div>
                <div class="col-lg-2">
                    <button class="btn btn-info" data-toggle="tooltip" data-placement="left" title="请添加为好友后查看更多资料">更多资料</button>
                </div>
                <div class="col-lg-2">
                    <button class="addFriend btn btn-success btn-sm" value={{$sameFaculty->id}}>加好友</button>
                </div>
            </div>
            <hr>
        @endforeach

        <div class="row">
            <h2>这些朋友是和您同一年毕业的</h2>
        </div>

        @foreach($sameGrades as $sameGrade)
            <div class="row" style="margin-top: 30px;">
                <div class="col-lg-1">
                    <img src="{{$sameGrade->avator_url}}" alt="用户头像">
                </div>
                <div class="col-lg-7">
                    <div class="row">
                        <span style="font-family: 'Microsoft Yahei'; font-weight: bold; margin-right: 20px;">{{$sameGrade->name}}</span>({{$sameGrade->gexingqianming}})
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        {{$sameGrade->school_name}}
                    </div>
                </div>
                <div class="col-lg-2">
                    <button class="btn btn-info" data-toggle="tooltip" data-placement="left" title="请添加为好友后查看更多资料">更多资料</button>
                </div>
                <div class="col-lg-2">
                    <button class="addFriend btn btn-success btn-sm" value={{$sameGrade->id}}>加好友</button>
                </div>
            </div>
            <hr>
        @endforeach
        </div>


    </div>

    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });

        $(function(){
            $(".addFriend").click(function(){
                var friend_id = $(this).attr('value');
                $.ajax({
                    type:'POST',
                    url:'/friend/add',
                    data: {friend_id:friend_id},
                    success:function(){
                        alert("添加好友成功");
                    },
                    error:function(msg){
                        alert(msg)
                    }
                });
            });
        });
    </script>
@endsection