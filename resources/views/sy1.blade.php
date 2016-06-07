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

    <script src="/build/react.js"></script>
    <script src="/build/react-dom.js"></script>
    <script src="/js/browser.min.js"></script>
    <script src="/js/jquery2.1.min.js"></script>
</head>
<body>


<div style="height: 100px;width: 1280px;background-image:url('/images/bj.png')">

</div>

<nav class="navbar navbar-default navbar-fixed-top" >
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" href="/">许昌学院 校友网</a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#chang" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse " id="chang">
            <ul class="nav navbar-nav" >
                <li><a href="/special">特别推荐</a></li>
                <li><a href="/school">校友动态</a></li>
                <li><a href="/myFriends">我的好友</a></li>
                <li><a href="/trend/put">发布动态</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                {{--判断用户是否登录--}}
                    <a href="/user/inputUserInfo">
                        <button type="button" class="btn btn-default navbar-btn">登录</button>
                    </a>

                    <a href="/auth/logout">
                        <button type="button" class="btn btn-default navbar-btn" style="margin-right: 80px;" >注册</button>
                    </a>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>




<div class="container" style="margin-top: 50px;">
    @yield('content')
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/js/jquery2.1.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/js/bootstrap.min.js"></script>
<script src="/js/bootstrapValidator.min.js"></script>
<script>
    function getNum() {
        $.get('/chat/getNumber',function (data) {
            console.log('getNumber'+data);
            $('#messageNumber').text(data);
        });
    }
    self.setInterval("getNum()",1000);
</script>

</body>
</html>