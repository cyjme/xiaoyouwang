@extends('layouts.main')
@section('content')
    <meta name="_token" content="{{ csrf_token() }}"/>
            <div id="UpdateUserInfo"></div>
            <div class="row col-lg-8 col-lg-offset-2">
                {!! Form::open(['url'=>'/home/updateUserInfo/avator','files'=>true]) !!}
                <div class="form-group">
                    {!! Form::label('touxiang','上传头像：') !!}
                    {!! Form::file('touxiang',null) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('上传头像',['class'=>'btn btn-success form-control']) !!}
                </div>
                {!! Form::close() !!}
            </div>
    <script type="text/babel" src="/js/react/updateUserInfo.js"></script>
@endsection