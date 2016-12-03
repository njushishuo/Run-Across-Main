<!DOCTYPE html>
<html>
<head>
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/materialize.min.css') }}" media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/common.css') }}" media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/user_friends.css') }}" media="screen,projection"/>
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
                    <ul id="nav-mobile" class="right">

                        <li ><a href="/user/{{ Session::get('user')->id }}/related-moments" ><span class="white-text center-align">动态</span></a></li>
                        <li class="active"><a  href= "/competitions" ><span class="white-text center-align">竞赛</span></a></li>
                        <li >
                            <a class="dropdown-button" href="" data-activates='dropdown'>
                                <div class="valign-wrapper">
                                    <img  class="valign  circle" style="width: 40px ; height: 40px;"  src="{{ Session::get('user')->avatar }} " alt="ME">
                                    <span class="valign white-text"> &nbsp {{ Session::get('user')->nick_name }}</span>
                                    <i class="material-icons right">arrow_drop_down</i>
                                </div>
                            </a>
                        </li>
                        <!-- Dropdown Structure -->
                        <ul id='dropdown' class='dropdown-content'>
                            <li><a href="/user/{{Session::get('user')->id}}/statistics">我的账号</a></li>
                            <li class="divider"></li>
                            <li><a href="/login">登出</a></li>
                        </ul>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>


<main>
    <div class="row white">
        <div class="col s12  m12 l8 offset-l2 " style="padding: 5px;">

            <!--二级功能按钮-->
            <hr>
            <div class="row white" style="margin: 0px" >
                <div class="col s1 offset-s4">
                    <a href="/user/{{Session::get('user')->id}}/userInfo" >
                        <span class="blue-text center-align waves-effect waves-light">个人资料</span>
                    </a>
                </div>

                <div class="col s1 ">
                    <a href="/user/{{Session::get('user')->id}}/deviceRecords/2016-12-03" >
                        <span class="blue-text center-align waves-effect waves-light">运动记录</span>
                    </a>
                </div>
                <div class="col s1 ">
                    <a href="/user/{{Session::get('user')->id}}/statistics" >
                        <span class="blue-text center-align waves-effect waves-light">数据统计</span>
                    </a>
                </div>
                <div class="col s1 ">
                    <a href="/user/{{Session::get('user')->id}}/friends" >
                        <span class="blue-text center-align waves-effect waves-light">我的朋友</span>
                    </a>
                </div>
            </div>
            <hr>
            <div class="row ">
                <!--Moments Create board and list-->
                <div class="col s12 m12 l10 offset-l1" >
                    <div class="card">
                        <div class="card-content" >
                            <div class="row">
                                <div class="col s12 m6 l6">
                                    <ul class="collection">
                                        <li class="collection-item" >
                                            <div class="row " style="margin-bottom: 0px">
                                                <div class="col s8">
                                                    <div class="valign-wrapper">
                                                        <img src="img/avatar1.png" alt="" class="valign avatar_img_friends ">
                                                        <p>
                                                            <span class="text_username blue-text">
                                                                ss14
                                                            </span>
                                                            <br>
                                                            <span class="text_userloc grey-text text-lighten-1 ">
                                                                @南京
                                                            </span>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col s4" style="padding: 0px">
                                                    <br>
                                                    <a href="#!" class="green-text text-lighten-1 float right" ><i class=" material-icons">grade</i></a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="collection-item" >
                                            <div class="row " style="margin-bottom: 0px">
                                                <div class="col s8">
                                                    <div class="valign-wrapper">
                                                        <img src="img/avatar2.jpg" alt="" class="valign avatar_img_friends ">
                                                        <p>
                                                            <span class="text_username blue-text">
                                                                星际笨哥
                                                            </span>
                                                            <br>
                                                            <span class="text_userloc grey-text text-lighten-1 ">
                                                                @北京
                                                            </span>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col s4" style="padding: 0px">
                                                    <br>
                                                    <a href="#!" class="green-text text-lighten-1 float right" ><i class=" material-icons">grade</i></a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="collection-item" >
                                            <div class="row " style="margin-bottom: 0px">
                                                <div class="col s8">
                                                    <div class="valign-wrapper">
                                                        <img src="img/avatar.jpeg" alt="" class="valign avatar_img_friends ">
                                                        <p>
                                                            <span class="text_username blue-text">
                                                                狼爷
                                                            </span>
                                                            <br>
                                                            <span class="text_userloc grey-text text-lighten-1 ">
                                                                @上海
                                                            </span>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col s4" style="padding: 0px">
                                                    <br>
                                                    <a href="#!" class="green-text text-lighten-1 float right" ><i class=" material-icons">grade</i></a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="collection-item" >
                                            <div class="row " style="margin-bottom: 0px">
                                                <div class="col s8">
                                                    <div class="valign-wrapper">
                                                        <img src="img/avatar1.png" alt="" class="valign avatar_img_friends ">
                                                        <p>
                                                            <span class="text_username blue-text">
                                                                ss14
                                                            </span>
                                                            <br>
                                                            <span class="text_userloc grey-text text-lighten-1 ">
                                                                @南京
                                                            </span>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col s4" style="padding: 0px">
                                                    <br>
                                                    <a href="#!" class="green-text text-lighten-1 float right" ><i class=" material-icons">grade</i></a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col s12 m6 l6">
                                    <ul class="collection">
                                        <li class="collection-item" >
                                            <div class="row " style="margin-bottom: 0px">
                                                <div class="col s8">
                                                    <div class="valign-wrapper">
                                                        <img src="img/avatar1.png" alt="" class="valign avatar_img_friends ">
                                                        <p>
                                                            <span class="text_username blue-text">
                                                                ss14
                                                            </span>
                                                            <br>
                                                            <span class="text_userloc grey-text text-lighten-1 ">
                                                                @南京
                                                            </span>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col s4" style="padding: 0px">
                                                    <br>
                                                    <a href="#!" class="green-text text-lighten-1 float right" ><i class=" material-icons">grade</i></a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="collection-item" >
                                            <div class="row " style="margin-bottom: 0px">
                                                <div class="col s8">
                                                    <div class="valign-wrapper">
                                                        <img src="img/avatar2.jpg" alt="" class="valign avatar_img_friends ">
                                                        <p>
                                                            <span class="text_username blue-text">
                                                                星际笨哥
                                                            </span>
                                                            <br>
                                                            <span class="text_userloc grey-text text-lighten-1 ">
                                                                @北京
                                                            </span>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col s4" style="padding: 0px">
                                                    <br>
                                                    <a href="#!" class="green-text text-lighten-1 float right" ><i class=" material-icons">grade</i></a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="collection-item" >
                                            <div class="row " style="margin-bottom: 0px">
                                                <div class="col s8">
                                                    <div class="valign-wrapper">
                                                        <img src="img/avatar.jpeg" alt="" class="valign avatar_img_friends ">
                                                        <p>
                                                            <span class="text_username blue-text">
                                                                狼爷
                                                            </span>
                                                            <br>
                                                            <span class="text_userloc grey-text text-lighten-1 ">
                                                                @上海
                                                            </span>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col s4" style="padding: 0px">
                                                    <br>
                                                    <a href="#!" class="green-text text-lighten-1 float right" ><i class=" material-icons">grade</i></a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="collection-item" >
                                            <div class="row " style="margin-bottom: 0px">
                                                <div class="col s8">
                                                    <div class="valign-wrapper">
                                                        <img src="img/avatar1.png" alt="" class="valign avatar_img_friends ">
                                                        <p>
                                                            <span class="text_username blue-text">
                                                                ss14
                                                            </span>
                                                            <br>
                                                            <span class="text_userloc grey-text text-lighten-1 ">
                                                                @南京
                                                            </span>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col s4" style="padding: 0px">
                                                    <br>
                                                    <a href="#!" class="green-text text-lighten-1 float right" ><i class=" material-icons">grade</i></a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                        <div class="card-action">
                            <a href="#">This is a link</a>
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
                    © 2016 Copyright
                </p>
            </div>
        </div>
    </div>
</footer>

<script type="text/javascript" src="{{URL::asset('js/jquery-2.2.4.min.js') }}"></script>
<script type="text/javascript" src="{{URL::asset('js/materialize.min.js') }}"></script>
<script type="text/javascript" src="{{URL::asset('js/user_friends.js') }}"></script>
</body>
</html>