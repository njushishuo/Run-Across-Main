<!DOCTYPE html>
<html>
<head>
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/materialize.min.css') }}" media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/common.css') }}" media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/user_profile.css') }}" media="screen,projection"/>
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
                                    <span class="valign white-text"> &nbsp {{ Session::get('user')->user_name }}</span>
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
            <div class="row">
                <div class="col s12 m12 l10 offset-l1">
                    <div class="card white lighten-1">
                        <div class="card-content">
                            <!--更换头像-->
                            <div class="row">
                                <div class="col s3 offset-s1 ">
                                    <img class="avatar_img_update" src="{{Session::get('user')->avatar}}" alt="头像" >
                                </div>
                                <div class="col s3 offset-s1 ">
                                    <br> <br> <br>
                                    <form action="#">
                                        <div class="file-field input-field">
                                            <div class="waves-effect waves-light btn-large white lighten-2">
                                                <span class="grey-text" >上传新头像</span>
                                                <input type="file">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!--基础信息-->
                            <div class="row">
                                <form class="col s10 offset-s1 black-text">
                                    <div class="row" style="margin:0px">
                                        <div class="input-field col s12">
                                            <Span class="text_label grey-text">用户名</Span> <br>
                                            <input value="ss14" id="username" type="text" class="validate" >
                                        </div>
                                    </div>
                                    <div class="row" >
                                        <div class="input-field col s3">
                                            <Span class="text_label grey-text">性别</Span> <br>
                                            <p>
                                                <input checked="checked" name="gender" type="radio" id="male" />
                                                <label for="male">男生</label>
                                            </p>
                                        </div>
                                        <div class="input-field col s3">
                                            <br>
                                            <p>
                                                <input name="gender" type="radio" id="famale" />
                                                <label for="famale">女生</label>
                                            </p>
                                        </div>
                                    </div>
                                    <br> <br>

                                    <div class="row">
                                        <div class="input-field col s12">
                                            <span class="text_label grey-text">生日</span><br>
                                            <input value="19 October, 2016" id="birthday" type="date" class="datepicker"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <span class="text_label grey-text">邮件</span><br>
                                            <input value="675342907@qq.com" id="email" type="email" class="validate">

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s3">
                                            <p>
                                                <Span class="text_label grey-text">兴趣</Span> <br>
                                                <input type="checkbox" id="Jogging"  />
                                                <label for="Jogging">慢跑</label>
                                            </p>
                                        </div>
                                        <div class="input-field col s3">
                                            <p>
                                                <br>
                                                <input type="checkbox" id="Running" checked="checked" />
                                                <label for="Running">跑步</label>
                                            </p>
                                        </div>
                                        <div class="input-field col s3">
                                            <p>
                                                <br>
                                                <input type="checkbox" id="Cycling"  />
                                                <label for="Cycling">骑行</label>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <span class="text_label grey-text">自我介绍</span><br>
                                            <textarea  id="textarea1" class="materialize-textarea"></textarea>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s4 offset-s4">
                                            <button class="btn yellow lighten-2 waves-effect waves-light " type="submit" name="action">
                                                更新
                                            </button>
                                        </div>
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
<script type="text/javascript" src="{{URL::asset('js/user_profile.js') }}"></script>
<script type="text/javascript" src="{{URL::asset('js/date_picker/picker.date.js') }}"></script>
<script type="text/javascript" src="{{URL::asset('js/date_picker/picker.js') }}"></script>
</body>

</html>