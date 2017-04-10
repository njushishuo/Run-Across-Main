<!DOCTYPE html>
<html>
<head>
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/materialize.min.css') }}" media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/common.css') }}" media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/moments_board.css') }}" media="screen,projection"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta name="keywords" content="运动跑步社交">
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
                                    <img  class="valign  circle" style="width: 40px ; height: 40px;"  src="{{ Session::get('user')->avatar  }} " alt="ME">
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
                <li class="tab col s3"><a target="_self" class="active" href="/user/{{Session::get('user')->id}}/related-moments">好友动态</a></li>
                <li class="tab col s3"><a target="_self"  href="/user/{{Session::get('user')->id}}/moments">我的动态</a></li>
            </ul>
        </div>
    </div>

    <div class="row white">
        <!--Content Board-->
        <div class="col s12  m12 l8 offset-l2 " style="padding: 5px;">
            <div class="row ">

                <!--Moments Create board and list-->
                <div class="col s12 l8" >
                    <!--Post new moment board-->
                    <div class="card white">
                        <div class="card-content black-text" style="padding-bottom: 0px;">
                            <form  method="post" id="postForm"
                                   action="/user/{{Session::get('user')->id}}/related-moments"
                                   enctype="multipart/form-data"  target="upload_target"  >
                                <!--Photo add bt-->
                                <div class="row" style=" margin-bottom: 0px;">
                                    <div class="col s12">
                                        <div class="file-field input-field">
                                            <a href="">
                                                <i class="small material-icons">add_a_photo</i>
                                                <span class="white blue-text lighten-1" style="font-size: 2em;font-weight: 300">图片</span>
                                                <input type="file" name="image"/>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <br/>
                            {{--<hr style=" opacity:0.3;">--}}
                            <!--Avatar and prompt-->
                                <div class="row" style="margin-bottom: 0px">
                                    <div class="col s12">
                                        <div class="row">
                                            <div class="col s12 m12 l2">
                                                <img class="avatar_img_create" src="{{ Session::get('user')->avatar }}" alt="用户头像">
                                            </div>
                                            <div class="input-field col s12 m12 l10">
                                                <label for="moment_content">想说点什么?</label>
                                                <textarea id="moment_content" name="moment_content" class="materialize-textarea" style="padding: 5px"></textarea>
                                                <div class="row" >
                                                    <div class="col s12 input-field right-align ">
                                                        <button type="submit"  class="btn blue lighten-2 waves-effect waves-light " >
                                                            发 表
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>


                    @foreach( $momentVOs as $momentVO)
                    <!--Moments come here-->
                    <div class="card">
                        <!--Avatar here-->
                        <div class="row" style="margin-bottom: 0px">
                            <div class="col s4 l2" style="padding:5px">
                                <img  class="avatar_img_moment" src="{{ $momentVO->moment->Author->avatar }}" alt="Contact Person">
                            </div>
                            <div class="input-field col s8 l10" style="padding-left: 0px;">
                                <span class="blue-text lighten-2 text_avatar" >{{ $momentVO->moment->Author->nick_name }}</span><br>
                                <span class="grey-text lighten-2 text_avatar" >{{ $momentVO->created_at }}</span>
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
                                    <button class="btn-flat" onclick="unVote({{$momentVO->moment->id.",".Session::get('user')->id}})">
                                        <i id="{{$momentVO->moment->id}}.star" class="orange-text material-icons">thumb_up</i>
                                    </button>
                                @endif
                                @if(!$momentVO->hasVoted)
                                    <button class="btn-flat" onclick="vote({{$momentVO->moment->id.",".Session::get('user')->id}})">
                                        <i id="{{$momentVO->moment->id}}.star" class=" material-icons">thumb_up</i>
                                    </button>
                                @endif
                                <span style="font-size: 2.2em;">{{$momentVO->count}}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>

                <!--TODO Suggested Or Rank-->
                <div class="col s12 m12 l4">
                    <div class="card z-depth-0">

                        <span class="blue-text lighten-2" style="font-size: 1.2em;font-weight:300">推荐动态</span>

                    @foreach( $momentVOs as $momentVO)
                        <!--Moments come here-->
                            <div class="card">
                                <!--Avatar here-->
                                <div class="row" style="margin-bottom: 0px">
                                    <div class="col s4 l4" style="padding:5px">
                                        <img  class="avatar_img_moment" src="{{ $momentVO->moment->Author->avatar }}" alt="Contact Person">
                                    </div>
                                    <div class="input-field col s8 l6" style="padding-left: 0px;">
                                        <span class="blue-text lighten-2 text_avatar" >{{ $momentVO->moment->Author->nick_name }}</span><br>
                                        <span class="grey-text lighten-2 text_avatar" >{{$momentVO->created_at}}</span>
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
                                            <button class="btn-flat" onclick="unVote({{$momentVO->moment->id.",".Session::get('user')->id}})">
                                                <i id="{{$momentVO->moment->id}}.star" class="orange-text material-icons">thumb_up</i>
                                            </button>
                                        @endif
                                        @if(!$momentVO->hasVoted)
                                            <button class="btn-flat" onclick="vote({{$momentVO->moment->id.",".Session::get('user')->id}})">
                                                <i id="{{$momentVO->moment->id}}.star" class=" material-icons">thumb_up</i>
                                            </button>
                                        @endif
                                        <span style="font-size: 2.2em;">{{$momentVO->count}}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
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
<script type="text/javascript" src="{{URL::asset('js/moments_board.js') }}"></script>
<script type="text/javascript" src="{{URL::asset('js/common.js') }}"></script>
</body>
</html>