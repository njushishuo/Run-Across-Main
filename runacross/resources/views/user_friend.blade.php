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
                <li class="tab col s3"><a target="_self"  href="/user/{{Session::get('user')->id}}/deviceRecords/default">运动记录</a></li>
                <li class="tab col s3"><a target="_self"  href="/user/{{Session::get('user')->id}}/statistics">数据统计</a></li>
                <li class="tab col s3"><a target="_self" class="active" href="/user/{{Session::get('user')->id}}/friends">我的朋友</a></li>
            </ul>
        </div>
    </div>
    <div class="row white">
        <div class="col s12  m12 l8 offset-l2 " style="padding: 5px;">

            <div class="row ">
                <!--follow list-->
                <div class="col s12 m12 l12 " >
                    <div class="row">
                        <div class="card">
                            {{--搜索用户--}}
                            <form action="/search" method="post"  id = "searchForm">
                                <div class="row valign-wrapper" style="margin-bottom: 0px">
                                    <div class="input-field col s10 l10">
                                        <input placeholder="昵称: shishuo" id="nick_name" name="nick_name" type="text" class="validate">
                                    </div>
                                    <div class="col s10 l2">
                                        <button type="submit" class="btn waves-effect waves-light">
                                            <i class="small material-icons">search</i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s12 l6">
                            {{--搜索结果--}}

                            <div class="card">
                                <div class="row">
                                    <span class="text_label">搜索结果</span>
                                </div>
                                <div class="row">
                                    @if($result!=null)
                                        <ul class="collection">
                                            @for($i=0;$i<count($result);$i++)
                                                <li class="collection-item">
                                                    <div class="row " style="margin-bottom: 0px">
                                                        <div class="col s8">
                                                            <div class="valign-wrapper">
                                                                <img src="{{$result[$i]->avatar}}" alt="" class="valign avatar_img_friends ">
                                                                <p>
                                                <span class="text_username blue-text">
                                                   {{$result[$i]->nick_name}}
                                                </span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="col s4" style="padding: 0px">
                                                            <br>
                                                            <button onclick="follow({{Session::get('user')->id.",".$result[$i]->id}})"
                                                                    class="btn blue lighten-1 float right" >
                                                                关注
                                                            </button>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endfor
                                        </ul>
                                    @endif
                                    @if($result==null)
                                        <span class="text_empty">什么都没有</span>
                                    @endif
                                </div>

                            </div>

                        </div>
                        <div class="col s12 l6">
                            <div class="card">
                                {{--followees 被用户关注的人--}}
                                <div class="row">
                                    <span class="text_label">我的关注</span>
                                    {{--<span class="text_follow_count">{{count($followees)}}</span>--}}
                                    {{--<span class="text_label"></span>--}}
                                </div>
                                <div class="row">
                                    @if($followees!=null)
                                        <ul class="collection">
                                            @for($i=0;$i<count($followees);$i++)
                                                <a class="collection-item">
                                                    <div class="row " style="margin-bottom: 0px">
                                                        <div class="col s12 l8">
                                                            <div class="valign-wrapper">
                                                                <div class="col s4 l4" style="padding:5px">
                                                                    <img src="{{$followees[$i]->avatar}}" alt="" class=" avatar_img_friends ">
                                                                </div>
                                                                <div class="input-field col s8 l8" style="padding-left: 0px;">
                                                                    <span class="grey-text lighten-2 text_avatar" >{{ $followees[$i]->nick_name }}</span><br>
                                                                    <span class="grey-text lighten-2 text_avatar" >{{ $followees[$i]->addr }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col s12 l4" style="padding: 0px">
                                                            <br>
                                                            <button onclick="unfollow({{Session::get('user')->id.",".$followees[$i]->id}})"
                                                                    class="btn red lighten-1 float right" >
                                                                取消关注
                                                            </button>
                                                        </div>
                                                    </div>
                                                </a>
                                            @endfor
                                        </ul>
                                    @endif
                                    @if($followees==null)
                                        <span class="text_empty">你还没有关注过他人哦</span>
                                    @endif
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
<script type="text/javascript" src="{{URL::asset('js/user_friends.js') }}"></script>
</body>
</html>