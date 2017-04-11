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

    <!--二级功能按钮-->
    <div class="row">
        <div class="col l4 offset-l4">
            <ul class="tabs">
                <li class="tab col s3"><a target="_self" class="active" href="/user/{{Session::get('user')->id}}/userInfo">个人资料</a></li>
                <li class="tab col s3"><a target="_self"  href="/user/{{Session::get('user')->id}}/deviceRecords/default">运动记录</a></li>
                <li class="tab col s3"><a target="_self"  href="/user/{{Session::get('user')->id}}/statistics">数据统计</a></li>
                <li class="tab col s3"><a target="_self"  href="/user/{{Session::get('user')->id}}/friends">我的朋友</a></li>
            </ul>
        </div>
    </div>
    <div class="row white">
        <div class="col s12  m12 l8 offset-l2 " style="padding: 5px;">
            <div class="row">
                <div class="col s12 l10 offset-l1">
                    <div class="card">
                        <div class="card-content">
                            <div class="row">
                                <div class="col s12 l12" >

                                    <!--个人信息-->
                                    <div class="row">
                                        <div class="col s12">
                                            <form  id="basicInfoForm" method="post" action="/user/{{Session::get('user')->id}}/userInfo"
                                                   enctype="multipart/form-data"  target="upload_target">
                                                <!--更换头像-->
                                                <div class="row" >
                                                    <div class="col s12 l3 ">
                                                        <img class="avatar_img_update" src="{{Session::get('user')->avatar}}" alt="头像" >
                                                    </div>
                                                    <div class="col s12 l9 file-field input-field " style="margin-top: 50px">
                                                        <button  class=" btn lighten-2 waves-effect waves-light">
                                                            选择文件
                                                            <input id="avatar" type="file" name="image"  />
                                                        </button>
                                                        {{--<input class="file-path validate" type="text">--}}
                                                    </div>
                                                </div>

                                                <div class="row" style="margin-bottom: 0px">
                                                    <div class="input-field col s12 l6 ">
                                                        <input value="{{Session::get('user')->nick_name}}"
                                                               id="nick_name" name="nick_name" type="text" class="validate" >
                                                        <label for="nick_name">昵称</label>
                                                    </div>

                                                    <div class="input-field col s12 l6" >
                                                        <input value="{{Session::get('user')->birthday}}"
                                                               id="birthday" name="birthday" type="text" class="datepicker" />
                                                        <label for="birthday">生日</label>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="input-field col s12 l6">
                                                        <input value="{{Session::get('user')->email}}" id="email" name="email" type="email" class="validate">
                                                        <label for="email">邮箱</label>
                                                    </div>
                                                    <div class="input-field col s12 l6">
                                                        <input value="{{Session::get('user')->addr}}" id="addr" name="addr" type="text" class="validate">
                                                        <label for="addr">城市</label>
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
                                                        <button type="submit"  class="center btn waves-effect waves-light " >
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
    <div class="footer-copyright">
        <div class="container">
            © 2017   Copyright
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