@extends('layouts.adminProvince')
@section('content')
    <h1>
        {{$schoolname}}
    </h1>

    <div class="panel panel-default">
        <div class="panel-body">
            <table class="table">
                <th>用户姓名</th>
                <th>用户性别</th>
                <th>用户邮箱</th>
                <th>操作</th>
                @foreach($data as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->sex}}</td>
                        <td>{{$user->email}}</td>
                        <td><button class="shanchu btn-sm btn-danger">删除</button></td>
                    </tr>
                    @endforeach
            </table>
        </div>
    </div>
    <script src="/js/jquery2.1.min.js"></script>

    <script>


        $(function () {
            $(".shanchu").click(function(){
                alert('确认删除?');
            });
        });

    </script>
    @endsection