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
    <script type="text/javascript" src="{{URL::asset('js/jquery-2.2.4.min.js') }}"></script>
    <script type="text/javascript" src="{{URL::asset('js/materialize.min.js') }}"></script>
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
                <!--Moments Create board and list-->
                <div class="col s12 m8 offset-m2 l8 offset-l2" style="margin-top: 100px" >

                    <blockquote>
                        <span class=" grey-text  ">爱运动、爱生活</span>
                    </blockquote>
                    <div class="card horizontal">
                        <div class="card-image">
                            <img src="img/c3.jpg">
                        </div>
                        <div class="card-stacked">
                            <div class="card-content" >
                                <form type="post" action="validation" >
                                    <div class="container input-field">
                                        <input  id="username" type="text" class="validate" >
                                        <label for="username" >用户名</label>
                                    </div>
                                    <div class="container input-field" >
                                        <input  id="password" type="text" class="validate" >
                                        <label for="password">密码</label>
                                    </div>
                                    <div class="container input-field center">
                                        <button class="btn blue lighten-2 waves-effect waves-light " type="submit" name="action">
                                            登陆
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
</main>



</body>
</html>