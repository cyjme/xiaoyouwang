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

    <div  style="float:right;margin-right: 30px;margin-top: 20px;">
        <a href="/auth/register" >
            <div  id="register" style="width:74px;height:30px;border:1px solid #fff; border-radius: 3px; text-align: center;">
                <span style="line-height:30px;margin:10px 20px;font-size: 10px;color: #fff;">注 册</span>
            </div>
        </a>
    </div>
{!! csrf_field() !!}

<div  class="col-lg-4 col-lg-offset-4" style="margin-top:170px;">
    <div class="col-lg-10 col-lg-offset-1">
        {!! Form::open(['url'=>'/auth/login','id'=>'myform']) !!}

        <div class="form-group">
            {!! Form::text('email',null,['class'=>'form-control','placeholder'=>'请输入邮箱','style'=>'text-align:center;background-color:rgb(250, 255, 189);']) !!}
        </div>

        <div class="form-group">
            {!! Form::password('password',['class'=>'form-control','placeholder'=>'请输入密码','style'=>'text-align:center;background-color:rgb(250, 255, 189);']) !!}
        </div>

        <div class="form-group">
            {!! Form::checkbox('remember','remember') !!}记住密码
        </div>

        <div class="form-group">
            {!! Form::submit('登 录  >',['class'=>'btn btn-info form-control','style'=>'background-color:#00B4FF;border-radius:25px;font-weight:bold;  ']) !!}
        </div>
        {!! Form::close() !!}
    </div>
</div>

    <script src="/js/jquery2.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myform').bootstrapValidator({
                fields: {
                    email: {
                        validators: {
                            notEmpty: {
                                message: '邮件地址不能为空'
                            }
                        }
                    },
                    password: {
                        validators: {
                            notEmpty: {
                                message: '密码不能为空'
                            }
                        }
                    },


                },
            });
        });
    </script>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/js/jquery2.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/bootstrapValidator.min.js"></script>
</body>
</html>