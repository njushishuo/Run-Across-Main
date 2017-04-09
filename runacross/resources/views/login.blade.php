<!DOCTYPE html>
<html>
<head>
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/materialize.min.css') }}" media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/common.css') }}" media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/login.css') }}" media="screen,projection"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>


<body>


<header>
    <div class="row">
        <div class="col s12" style="padding: 0px">

            <nav class="navbar-fixed">
                <div class="nav-wrapper blue lighten-1">
                    <a href="">
                        <span class="logo" > Logo</span>
                    </a>
                </div>
            </nav>
        </div>
    </div>
</header>


<main>
    <div class="row white">
        <!--Content Board-->
        <div class="col s12  m12 l8 offset-l2 " style="padding: 5px;">
            <div class="row ">
                <div class="col s12 m8 offset-m2 l8 offset-l2" style="margin-top: 50px" >
                    <blockquote>
                        <span class=" grey-text  ">爱运动、爱生活</span>
                    </blockquote>

                    <div class="card">

                        <ul class="tabs " style="margin-left: 10px ; max-width: 200px">
                            <li class="tab col s3"><a href="#login">登陆</a></li>
                            <li class="tab col s3"><a href="#register">注册</a></li>
                        </ul>

                        <div class="z-depth-0 card horizontal" id="login">
                            <div class="card-image">
                                <img src="img/login.jpg" alt="赶快登陆吧！">
                            </div>
                            <div class="card-stacked">
                                <div class="card-content" >

                                    <form  method="post" id="loginForm" >
                                        <div class="container input-field">
                                            <input  name="username" type="text" class="validate" >
                                            <label for="username" >用户名</label>
                                        </div>
                                        <div class="container input-field" >
                                            <input  name="password" type="password" class="validate " >
                                            <label for="password">密码</label>
                                        </div>
                                        <div class="container input-field center">
                                            <button type="button" onclick="loginVerify()" class="btn blue lighten-2 waves-effect waves-light " >
                                                登陆
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="z-depth-0 card horizontal" id="register">
                            <div class="card-image">
                                <img src="img/register.jpg">
                            </div>
                            <div class="card-stacked">
                                <div class="card-content" >

                                    <form method="post" id="registerForm">
                                        <div class="container input-field">
                                            <input  name="r_username" type="text" class="validate" >
                                            <label for="username" >用户名</label>
                                        </div>
                                        <div class="container input-field" >
                                            <input  name="r_password" type="password" class="validate" >
                                            <label for="password">密码</label>
                                        </div>
                                        <div class="container input-field center">
                                            <button type="button" onclick="register()"  class="btn blue lighten-2 waves-effect waves-light " >
                                                注册
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</main>

<footer class="blue lighten-1 grey-text text-lighten-4">
    <div class="row">
        <div class="col s4 offset-s8">
            <div class="container">
                <p class="grey-text text-lighten-4">
                    欢迎注册并使用本网站 © 2016 Copyright
                </p>
            </div>
        </div>
    </div>
</footer>


<script type="text/javascript" src="{{URL::asset('js/jquery-2.2.4.min.js') }}"></script>
<script type="text/javascript" src="{{URL::asset('js/materialize.min.js') }}"></script>
<script type="text/javascript" src="{{URL::asset('js/login.js') }}"></script>

</body>
</html>