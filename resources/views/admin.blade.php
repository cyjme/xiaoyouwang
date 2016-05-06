@extends('layouts.adminProvince')
@section('content')
        <!-- Morris Charts CSS -->
<link href="../bower_components/morrisjs/morris.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">所有用户</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{$number['xcxy']}}</div>
                        <div>许昌学院</div>
                    </div>
                </div>
            </div>
            <a href="/admin/xcxy">
                <div class="panel-footer">
                    <span class="pull-left">点击查看</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{$number['zzdx']}}</div>
                        <div>郑州大学</div>
                    </div>
                </div>
            </div>
            <a href="/admin/zzdx">
                <div class="panel-footer">
                    <span class="pull-left">点击查看</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{$number['hndx']}}</div>
                        <div>河南大学</div>
                    </div>
                </div>
            </div>
            <a href="/admin/hndx">
                <div class="panel-footer">
                    <span class="pull-left">点击查看</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{$number['zzqg']}}</div>
                        <div>郑州轻工业学院</div>
                    </div>
                </div>
            </div>
            <a href="/admin/zzqg">
                <div class="panel-footer">
                    <span class="pull-left">点击查看</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
<!-- /.row -->
<div class="row" >
    <div class="col-lg-6 col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                作品分类饼图
            </div>
            <div class="panel-body">
                <canvas id="chart-area" width="300" height="300"/>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                各院校作品数量
            </div>
            <div class="panel-body">
                <table class="table">
                    <th>学校名称</th>
                    <th>作品数量</th>
                    {{--@foreach($schools as $school)--}}
                        {{--<tr>--}}
                            {{--<td>{{$school->school}}</td>--}}
                            {{--<td>{{$school->COUNT}}</td>--}}
                        {{--</tr>--}}
                    {{--@endforeach--}}
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="">

    </div>
</div>
<!-- /.row -->

<!-- jQuery -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>
<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>


{{--获取学校作品各个分类的数量，隐藏起来，方便页面中的饼图的js调用--}}
<input type="hidden" id="a" value="{{$number['xcxy']}}">
<input type="hidden" id="b" value="{{$number['zzdx']}}">
<input type="hidden" id="c" value="{{$number['hndx']}}">
<input type="hidden" id="d" value="{{$number['zzqg']}}">
<script>


    var a = document.getElementById('a').value;
    var b = document.getElementById('b').value;
    var c = document.getElementById('c').value;
    var d = document.getElementById('d').value;

    var pieData = [
        {
            value: a,
            color:"#F7464A",
            highlight: "#FF5A5E",
            label: "许昌学院"
        },
        {
            value: b,
            color: "#46BFBD",
            highlight: "#5AD3D1",
            label: "郑州大学"
        },
        {
            value: c,
            color: "#FDB45C",
            highlight: "#FFC870",
            label: "河南大学"
        },
        {
            value: d,
            color: "#949FB1",
            highlight: "#A8B3C5",
            label: "郑州轻工业学院"
        }

    ];

    window.onload = function(){
        var ctx = document.getElementById("chart-area").getContext("2d");
        window.myPie = new Chart(ctx).Pie(pieData);
    };



    window.onload = function(){
        var ctx = document.getElementById("chart-area").getContext("2d");
        window.myPie = new Chart(ctx).Pie(pieData);
    }
</script>

@endsection
