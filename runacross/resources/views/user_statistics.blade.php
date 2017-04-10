<!DOCTYPE html>
<html>
<head>

    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/materialize.min.css') }}" media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/common.css') }}" media="screen,projection"/>
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
            <div class="row center-align">
                <!--头像-->
                <div class="col s12 m3 hide-on-small-only" style="padding:0px">
                    <div class="card ">
                        <div class="card-image">
                            <img src="{{Session::get('user')->avatar}}">
                        </div>
                        <div class="card-content">
                            <span style="font-size: 2em">{{Session::get('user')->nick_name}}</span>
                        </div>

                        <hr style="opacity: 0.3">

                        <div>
                            <a class="orange-text tooltipped" data-position="bottom" data-delay="50" data-tooltip="卡币余额:{{Session::get('user')->gold_corn}}">
                                <i class="material-icons">attach_money</i>
                            </a>
                            <a class="orange-text tooltipped" data-position="bottom" data-delay="50" data-tooltip="所在地:南京">
                                <i class="material-icons">location_on</i>
                            </a>
                            <a class="orange-text tooltipped" data-position="bottom" data-delay="50" data-tooltip="生日:{{Session::get('user')->birthday}}">
                                <i class="material-icons">cake</i>
                            </a>
                            <a class="orange-text tooltipped" data-position="bottom" data-delay="50" data-tooltip="关注的人:{{Session::get('user')->follow_count}}">
                                <i class="material-icons">stars</i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col s12 m9 ">
                    <!--总统计-->
                    <div class="card">
                        <!--自加入以来-->
                        <div class="row ">
                            <span style="font-size: 1.5em">我加入XX以来</span>
                        </div>
                        <div class="row  blue-text ">
                            <div class="col s12 m4">
                                <div class="valign-wrapper">
                                    <i class="valign large material-icons " >directions_run</i>
                                    <p class="valign ">
                                        <span >累计运动距离</span><br>
                                        <span class="text_stats " >{{$summary->total_distance}}</span>
                                        <span>公里</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col s12 m4">
                                <div class="valign-wrapper">
                                    <i class="valign large material-icons ">access_alarm</i>
                                    <p class="valign">
                                        <span>累计运动时间</span><br>
                                        <span class="text_stats">{{$summary->total_duration}}</span>
                                        <span>小时</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col s12 m4">
                                <div class="valign-wrapper">
                                    <i class="valign large material-icons ">whatshot</i>
                                    <p class="valign">
                                        <span>累计燃烧大卡</span><br>
                                        <span class="text_stats">{{$summary->total_colarie}}</span>
                                        <span>大卡</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--按时间统计-->
                    <div class="card">
                        <div class="row">
                            <!-- Dropdown Trigger -->
                            <a class="left black-text dropdown-button" href="" data-activates="dropdown_time">时间段
                                <i class="material-icons right">arrow_drop_down</i>
                            </a>

                            <!-- Dropdown Structure -->
                            <ul id='dropdown_time' class='dropdown-content'>
                                <li><a href="#" class="black-text">最近一周</a></li>
                                <li><a href="#!" class="black-text">最近一月</a></li>
                            </ul>
                        </div>

                        <div class="container">
                            <span>最近7天的运动距离和时长</span>
                        </div>
                        <div class="container">
                            <div id="barChart_dist" style="height: 400px; margin: 0 auto"></div>
                        </div>

                        <div class="container">
                            <span>最近7天的热量燃烧</span>
                        </div>
                        <div class="container">
                            <div id="barChart_calorie" style="height: 400px; margin: 0 auto"></div>
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
<script type="text/javascript" src="{{URL::asset('js/user_stats.js') }}"></script>
<script type="text/javascript" src="{{URL::asset('js/eCharts/echarts.js') }}"></script>
<script type="text/javascript" src="{{URL::asset('js/eCharts/theme/infographic.js') }}"></script>
<script type="text/javascript" src="{{URL::asset('js/eCharts/theme/macarons.js') }}"></script>

</body>
</html>