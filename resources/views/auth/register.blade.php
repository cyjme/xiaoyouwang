<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>校友网</title>

    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/bootstrapValidator.min.css">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>



{{--可以让myform逐渐出现，为myform  加上style="display:none;"--}}
{{--<script>--}}
{{--$(function(){--}}
{{--$("#myform").fadeIn(1000);--}}
{{--});--}}
{{--</script>--}}
<style>
    a:link {color: #000000;text-decoration: no-underline;}     /* 未访问的链接 */
    a:visited {color: #000000;text-decoration: no-underline;}  /* 已访问的链接 */
    a:hover {color: #000000;text-decoration: no-underline;}    /* 当有鼠标悬停在链接上 */
    a:active {color: #000000;text-decoration: no-underline;}   /* 被选择的链接 */
    a{

    }
    body{background:url("/images/login_bg.jpg");background-size:100%;}
    #register:hover{
        background-color: #2ca02c;
    }
</style>

    <div class="row">
        <div class="col-lg-4 col-lg-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    注册
                </div>
                <div class="panel-body">
                    <form method="POST" action="/auth/register">
                        {!! csrf_field() !!}
                        {!! Form::open(['url'=>'/auth/register']) !!}
                        <div class="form-group">
                            {!! Form::label('name','用户名：') !!}
                            {!! Form::text('name',null,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('email','邮箱：') !!}
                            {!! Form::text('email',null,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('password','密码：') !!}
                            {!! Form::password('password', ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('password_confirmation','重复密码：') !!}
                            {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('注册',['class'=>'btn btn-success form-control']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/js/jquery2.1.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/js/bootstrap.min.js"></script>
<script src="/js/bootstrapValidator.min.js"></script>
</body>
</html>