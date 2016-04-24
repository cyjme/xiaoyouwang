@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{$user->name}}的详细资料
                </div>
                <div class="panel-body">
                    <table class="table table-responsive">
                        <tr>
                            <td>姓名：</td>
                            <td>{{$user->name}}</td>
                        </tr>
                        <tr>
                            <td>性别：</td>
                            <td>{{$user->sex}}</td>
                        </tr>
                        <tr>
                            <td>个性签名：</td>
                            <td>{{$user->gexingqianming}}</td>
                        </tr>
                        <tr>
                            <td>学校：</td>
                            <td>{{$user->school_name}}</td>
                        </tr>
                        <tr>
                            <td>院系：</td>
                            <td>{{$user->faculty}}</td>
                        </tr>
                        <tr>
                            <td>专业：</td>
                            <td>{{$user->major}}</td>
                        </tr>
                        <tr>
                            <td>年级：</td>
                            <td>{{$user->grade}}</td>
                        </tr>
                        <tr>
                            <td>手机号码：</td>
                            <td>{{$user->phone_number}}</td>
                        </tr>
                        <tr>
                            <td>兴趣爱好：</td>
                            <td>{{$user->insters}}</td>
                        </tr>
                        <tr>
                            <td>公司：</td>
                            <td>{{$user->company}}</td>
                        </tr>
                        <tr>
                            <td>现居住城市：</td>
                            <td>{{$user->city}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @endsection