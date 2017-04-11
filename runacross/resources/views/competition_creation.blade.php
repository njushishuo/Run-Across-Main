
<!DOCTYPE html>
<html>
<head>
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/materialize.min.css') }}" media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/common.css') }}" media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/competition_creation.css') }}" media="screen,projection"/>
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
    {{--二级功能列表--}}
    <div class="row">
        <div class="col l4 offset-l4">
            <ul class="tabs">
                <li class="tab col s3"><a target="_self"  href="/competitions" >竞赛场</a></li>
                <li class="tab col s3"><a target="_self"  href="/user/{{Session::get('user')->id}}/competitions">我的竞赛</a></li>
                <li class="tab col s3"><a target="_self" class="active" href="/competitions/creation">新建竞赛</a></li>
            </ul>
        </div>
    </div>
    <div class="row white">
        <!--Content Board-->
        <div class="col s12  m10 l8 offset-l2 " style="padding: 5px;">
            <!--基础信息-->
            <div class="row">
                <div class="col s10 offset-s1 black-text">
                    <div class="card">
                        <div class="card-content" style="padding-left: 50px ; padding-right: 50px">

                            <span class="text_create ">创建竞赛</span>

                            <form method="post" id="createCmptForm" action="/user/{{Session::get('user')->id}}/competitions"
                                  enctype="multipart/form-data"  target="upload_target"  >

                                <!--Photo add bt-->
                                <div class="row" style="margin-bottom: 0px">
                                    <div class="file-field input-field col s12 l6" style="margin-top: 20px ;">
                                        <button class="btn">
                                            <span>图 片</span>
                                            <input type="file" name="image">
                                        </button>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text" placeholder="上传一张图片吧">
                                        </div>
                                    </div>
                                </div>

                                <div class="row"  >
                                    <div class="input-field col s6 m3 l3" >
                                        <input id="type_idv" name="type" type="radio" checked="checked" value="individual" />
                                        <label for="type_idv">个人赛</label>
                                    </div>
                                    <div class="input-field col s6 m3 l3" >
                                        <input id="type_team" name="type" type="radio"  value="team"/>
                                        <label for="type_team">团队赛</label>
                                    </div>
                                </div>

                                <div class="row" >
                                    <div class="input-field col s12 l6">
                                        <input  id="title" name="title" type="text" class="validate" >
                                        <label for="title">标题</label>
                                    </div>
                                    <div class="input-field col s12 l6">
                                        <input  id="reward" name="reward" type="number" class="validate" >
                                        <label for="reward">赏金</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col s12 l6" style="margin-top: 0px;">
                                        <input id="start_at" name="start_at" type="date" class="datepicker"  >
                                        <label for="start_at">开始日期</label>
                                    </div>
                                    <div class="input-field col s12 l6" style="margin-top: 0px" >
                                        <input id="end_at" name="end_at" type="date" class="datepicker" >
                                        <label for="end_at">结束日期</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col s12 input-field center">
                                        <button type="submit"  class="btn  lighten-2 waves-effect waves-light " >
                                            发  布
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
<script type="text/javascript" src="{{URL::asset('js/competition_creation.js') }}"></script>
<script type="text/javascript" src="{{URL::asset('js/date_picker/picker.date.js') }}"></script>
<script type="text/javascript" src="{{URL::asset('js/date_picker/picker.js') }}"></script>
</body>
</html>