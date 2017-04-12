<!DOCTYPE html>
<html>
<head>
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/materialize.min.css') }}" media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/common.css') }}" media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/moments_mine.css') }}" media="screen,projection"/>
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

                        <li class="active"><a href="/user/{{ Session::get('user')->id }}/related-moments" ><span class="white-text center-align">动态</span></a></li>
                        <li ><a  href= "/competitions" ><span class="white-text center-align">竞赛</span></a></li>
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

    <!--二级功能按钮-->
    <div class="row">
        <div class="col l4 offset-l4">
            <ul class="tabs">
                <li class="tab col s3"><a target="_self"  href="/user/{{Session::get('user')->id}}/related-moments">好友动态</a></li>
                <li class="tab col s3"><a target="_self" class="active" href="/user/{{Session::get('user')->id}}/moments">我的动态</a></li>
            </ul>
        </div>
    </div>

    <div class="row white">
        <!--Content Board-->
        <div class="col s12  m12 l10 offset-l1 " style="padding: 5px;">
            <div class="row ">
                <!--Moments Create board and list-->
                <div class="col s12 m12 l8 offset-l2" >

                @foreach( $momentVOs as $momentVO)
                    <!--Moments come here-->
                        <div class="card" id="{{$momentVO->moment->id}}" >
                            <!--Avatar here-->
                            <div class="row" style="margin-bottom: 0px">
                                <div class="col s4 l2" style="padding:5px">
                                    <img  class="avatar_img_moment" src="{{ $momentVO->moment->Author->avatar }}" alt="Contact Person">
                                </div>
                                <div class="input-field col s4 l8" style="padding-left: 0px;">
                                    <span class="blue-text lighten-2 text_avatar" >{{ $momentVO->moment->Author->nick_name }}</span><br>
                                    <span class="grey-text lighten-2 text_avatar" >{{ $momentVO->created_at }}</span>
                                </div>
                                <div class="input-field col s4 l2" style="padding-left: 0px;">
                                    {{--<button )"--}}
                                    <a onclick="showToasts({{Session::get('user')->id.",".$momentVO->moment->id}})"
                                       class=" btn lighten-1 waves-effect waves-light">删除</a>
                                </div>
                            </div>
                            <!--img here-->
                            @if($momentVO->moment->picture!=null)
                                <div class="card-image">
                                    <img src="{{$momentVO->moment->picture}}">
                                </div>
                            @endif
                            <!--discription here-->
                            <div class="card-content">
                                <p> {{$momentVO->moment->content }} </p>
                            </div>
                            <!--Actions here-->
                            <div class="card-action">
                                <div class="valign-wrapper">
                                    @if($momentVO->hasVoted)
                                        <button class="btn-flat " onclick="vote({{$momentVO->moment->id.",".Session::get('user')->id}})">
                                            <i id="{{$momentVO->moment->id."star"}}" class="red-text material-icons">thumb_up</i>
                                        </button>
                                    @endif
                                    @if(!$momentVO->hasVoted)
                                        <button class="btn-flat" onclick="vote({{$momentVO->moment->id.",".Session::get('user')->id}})">
                                            <i id="{{$momentVO->moment->id."star"}}" class="black-text material-icons">thumb_up</i>
                                        </button>
                                    @endif
                                    <span class="text_vote" id="{{$momentVO->moment->id."span"}}">{{$momentVO->count}}</span>
                                </div>
                            </div>
                        </div>

                @endforeach
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
<script type="text/javascript" src="{{URL::asset('js/moments_mine.js') }}"></script>
<script type="text/javascript" src="{{URL::asset('js/moments_board.js') }}"></script>
<script type="text/javascript" src="{{URL::asset('js/common.js') }}"></script>
</body>
</html>