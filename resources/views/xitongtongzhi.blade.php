@extends('layouts.adminProvince')
@section('content')
    <div class="row">
        <h1>
            发布系统消息
        </h1>
    </div>
    <div class="row">
        <div>
            <div class="col-lg-6 col-lg-offset-3">
                {!! Form::open(['url'=>'/admin/posttongzhi']) !!}
                <div class="form-group">
                    {!! Form::textarea('new',null,['class'=>'col-lg-12','placeholder'=>'您的通知将发送给所有的用户...']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('确认发送',['class'=>'btn btn-success form-control']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    @endsection