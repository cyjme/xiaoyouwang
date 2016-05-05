@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            {!! Form::open(['url'=>'/trend/post','files'=>true]) !!}
            <div class="form-group">
                {!! Form::textarea('trend',null,['class'=>'col-lg-12','placeholder'=>'说点什么吧...']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('image','动态配图：') !!}
                {!! Form::file('image',null) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('上传图片',['class'=>'btn btn-success form-control']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection