<!DOCTYPE html>
<html>
<head>
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/materialize.min.css') }}" media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/common.css') }}" media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/user_record.css') }}" media="screen,projection"/>
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
                <li class="tab col s3"><a target="_self"  href="/user/{{Session::get('user')->id}}/userInfo">个人资料</a></li>
                <li class="tab col s3"><a target="_self" class="active" href="/user/{{Session::get('user')->id}}/deviceRecords/default">运动记录</a></li>
                <li class="tab col s3"><a target="_self"  href="/user/{{Session::get('user')->id}}/statistics">数据统计</a></li>
                <li class="tab col s3"><a target="_self"  href="/user/{{Session::get('user')->id}}/friends">我的朋友</a></li>
            </ul>
        </div>
    </div>
    <div class="row white">
        <div class="col s12  m12 l8 offset-l2 " style="padding: 5px;">
            <div class="row">
                <div class="col s12 m12 l10 offset-l1">
                    <div class="card">
                        <div class="card-content ">
                            <div class="row valign-wrapper  ">
                                <div class="col s6 l3 input-field" >
                                    <input id="record_date" type="text"  value="{{$date}}"
                                           class="datepicker picker__input" style="max-width: 150px">
                                    <label for="record_date">日期</label>
                                </div>
                                <div class="col s6 l9">
                                    <button onclick="updateRecord({{Session::get('user')->id}})"
                                            class=" waves-effect waves-light btn">查看
                                    </button>
                                </div>
                            </div>
                            @if($record!=null)
                            <div class="row">
                                <div class="col s8 center-align" >
                                    <span style="font-size: 6em">
                                        {{ $record->distance }}
                                    </span>
                                    <span style="font-size: 2em">
                                        km
                                    </span>
                                </div>
                                <div class="col s4">
                                    <div class="grey-text lighten-3" style="font-size: 2em; font-weight: 300">
                                        <p style="margin-top:20px">
                                            跑步
                                            <br>
                                            {{$record->start_at}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12" >
                                    <ul class="collection" style="border-width: 0px">
                                        <li class="collection-item">
                                            <div class="row" style="margin-bottom: 0px">
                                                <div class="col s12 m3" >
                                                    时长:
                                                </div>
                                                <div class="col s12 m3" >
                                                    {{$record->duration}}
                                                </div>
                                                <div class="col s12 m3">
                                                    平均配速(分钟/公里):
                                                </div>
                                                <div class="col s12 m3" >
                                                    {{$record->avg_pace}}
                                                </div>
                                            </div>

                                        </li>
                                        <li class="collection-item">
                                            <div class="row" style="margin-bottom: 0px">
                                                <div class="col s6 m3" >
                                                    卡路里(大卡):
                                                </div>
                                                <div class="col s6 m3" >
                                                    {{$record->calorie}}
                                                </div>
                                                <div class="col s6 m3">
                                                    平均速度(公里/小时):
                                                </div>
                                                <div class="col s6 m3" >
                                                    {{$record->avg_speed}}
                                                </div>
                                            </div>
                                        </li>
                                        <li class="collection-item">
                                            <div class="row" style="margin-bottom: 0px">
                                                <div class="col s6 m3" >
                                                    步频(步/分钟):
                                                </div>
                                                <div class="col s6 m3" >
                                                    {{$record->stride_frequency}}
                                                </div>
                                                <div class="col s6 m3">
                                                    平均步幅(厘米):
                                                </div>
                                                <div class="col s6 m3" >
                                                    {{$record->avg_stride}}
                                                </div>
                                            </div>
                                        </li>
                                        <li class="collection-item">
                                            <div class="row" style="margin-bottom: 0px">
                                                <div class="col s6 m3" >
                                                    步数:
                                                </div>
                                                <div class="col s6 m3" >
                                                    {{$record->total_stride}}
                                                </div>
                                                <div class="col s6 m3">
                                                    心率(bpm):
                                                </div>
                                                <div class="col s6 m3" >
                                                    {{$record->heart_rate}}
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @endif
                            @if($record==null)
                                <div class="row">
                                    <div class="col s12" >
                                        <span>今天好像没有运动记录哦</span>
                                    </div>
                                </div>
                            @endif

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
<script type="text/javascript" src="{{URL::asset('js/user_record.js') }}"></script>
<script type="text/javascript" src="{{URL::asset('js/date_picker/picker.date.js') }}"></script>
<script type="text/javascript" src="{{URL::asset('js/date_picker/picker.js') }}"></script>

</body>
</html>