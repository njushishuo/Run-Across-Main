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
                        <li ><a  href= "/competitions" ><span class="white-text center-align">竞赛</span></a></li>
                        <li class="active">
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
                    <a href="/user/{{Session::get('user')->id}}/deviceRecords/default" >
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
                            <div class="row">
                                <div class="col s10 offset-s1 black-text" >
                                    <!--更换头像-->
                                    <div class="row" >
                                        <div class="col s4 ">
                                            <img class="avatar_img_update" src="{{Session::get('user')->avatar}}" alt="头像" >
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col s12">
                                            <form  method="post" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="file-field input-field ">
                                                        <div class="col s3 " >
                                                            <div   class="btn lighten-2 waves-effect waves-light">
                                                                选择文件
                                                                <input id="avatar" name="avatar" type="file"  />
                                                            </div>
                                                        </div>
                                                        <div class="col s9">
                                                            <input id="filename" class="file-path validate" type="text"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" >
                                                    <div class="input-field col s12">
                                                        <button type="button" onclick=""
                                                                class="center btn lighten-2 waves-effect waves-light " >
                                                            上传文件
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>



                                    <!--更换基础信息-->
                                    <div class="row">
                                        <div class="col s12">
                                            <form  id="basicInfoForm" method="post">
                                                <div class="row" style="margin:0px">
                                                    <div class="input-field col s12">
                                                        <input value="{{Session::get('user')->nick_name}}"
                                                               id="nick_name" name="nick_name" type="text" class="validate" >
                                                        <label for="nick_name">昵称</label>
                                                    </div>
                                                </div>
                                                <div class="row" >
                                                    @if(Session::get('user')->gender=='male')
                                                        <div class="input-field col s3" style="margin-top: 0px ">
                                                            <input checked="checked" id="male" value="male" name="gender" type="radio"  />
                                                            <label for="male">男生</label>
                                                        </div>
                                                        <div class="input-field col s3" style="margin-top: 0px">
                                                            <input  id="famale" name="gender" value="female" type="radio"  />
                                                            <label for="famale">女生</label>
                                                        </div>
                                                    @endif
                                                    @if(Session::get('user')->gender=='female')
                                                        <div class="input-field col s3" style="margin-top: 0px ">
                                                            <input id="male" value="male" name="gender" type="radio"  />
                                                            <label for="male">男生</label>
                                                        </div>
                                                        <div class="input-field col s3" style="margin-top: 0px">
                                                            <input checked="checked" id="famale" name="gender" value="female" type="radio"  />
                                                            <label for="famale">女生</label>
                                                        </div>
                                                    @endif
                                                </div>
                                                <br/>
                                                <div class="row">
                                                    <div class="input-field col s12">
                                                        <input value="{{Session::get('user')->birthday}}" id="birthday" name="birthday" type="date"
                                                               class="datepicker"/>
                                                        <label for="birthday">生日</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="input-field col s12">
                                                        <input value="{{Session::get('user')->email}}" id="email" name="email" type="email" class="validate">
                                                        <label for="email">邮箱</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="input-field col s3" style="margin-top: 0px">
                                                        @if(Session::get('user')->talent=='short_distance')
                                                            <input checked="checked" type="radio" value="short_distance" id="short_distance" name="talent" />
                                                        @else
                                                            <input type="radio" value="short_distance" id="short_distance" name="talent" />
                                                        @endif
                                                        <label for="short_distance">短跑</label>
                                                    </div>
                                                    <div class="input-field col s3" style="margin-top: 0px">
                                                        @if(Session::get('user')->talent=='medium_distance')
                                                            <input checked="checked" type="radio" value="medium_distance" id="medium_distance" name="talent"/>
                                                        @else
                                                            <input type="radio" value="medium_distance" id="medium_distance" name="talent"/>
                                                        @endif
                                                        <label for="medium_distance">中长跑</label>
                                                    </div>
                                                    <div class="input-field col s3" style="margin-top: 0px">
                                                        @if(Session::get('user')->talent=='long_distance')
                                                            <input checked="checked" type="radio" value="long_distance" id="long_distance" name="talent"/>
                                                        @else
                                                            <input type="radio" value="long_distance" id="long_distance" name="talent"/>
                                                        @endif
                                                        <label for="long_distance">长跑</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="input-field col s12">
                                                        <input value="{{Session::get('user')->biography}}"  id="bio" name="bio" type="text" class="validate"    >
                                                        </input>
                                                        <label for="bio">自我介绍</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="input-field col s4 offset-s4">
                                                        <button type="button" onclick="updateInfo({{Session::get('user')->id}})" class="center btn yellow lighten-2 waves-effect waves-light " >
                                                            更新个人信息
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