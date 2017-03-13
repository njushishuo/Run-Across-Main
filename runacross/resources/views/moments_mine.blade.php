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
    <div class="row white">
        <!--Content Board-->
        <div class="col s12  m12 l8 offset-l2 " style="padding: 5px;">
            <!--二级功能按钮-->
            <hr>
            <div class="row white" style="margin: 0px" >
                <div class="col s1 offset-s5">
                    <a href="/user/{{Session::get('user')->id}}/related-moments" >
                        <span class="blue-text center-align waves-effect waves-light">动态板</span>
                    </a>
                </div>
                <div class="col s1 ">
                    <a href="/user/{{Session::get('user')->id}}/moments" >
                        <span class="blue-text center-align waves-effect waves-light">我的动态</span>
                    </a>
                </div>
            </div>
            <hr>

            <div class="row ">
                <!--Moments Create board and list-->
                <div class="col s12 m12 l8 offset-l2" >
                    <!--Post new moment board-->
                    <div class="card white">
                        <div class="card-content black-text">

                            <form  method="post" id="postForm" action="/user/{{Session::get('user')->id}}/moments">
                                <!--Photo add bt-->
                                <div class="row" style="margin-bottom: 0px">
                                    <div class="col s12">
                                        <div class="file-field input-field">
                                            <a href="">
                                                <i class="small material-icons">add_a_photo</i>
                                                <span class="white blue-text lighten-1" style="font-size: 2em;font-weight: 300">图片</span>
                                                <input type="file" multiple/>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <hr style=" opacity:0.3;">
                                <!--Avatar and prompt-->
                                <div class="row">
                                    <div class="col s12">
                                        <div class="row">
                                            <div class="col s12 m12 l2">
                                                <img class="avatar_img_create" src="{{session('user')->avatar }}" alt="用户头像">
                                            </div>
                                            <div class="input-field col s12 m12 l10">
                                                <label for="moment_content">想说点什么?</label>
                                                <textarea id="moment_content" name="moment_content" class="materialize-textarea" style="padding: 5px"></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col s12">
                                                <!--TODO display picture-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr style=" opacity:0.3;">
                                <!--Post bt-->
                                <div class="row">
                                    <div class="col s12 input-field center">
                                        <button type="submit"  class="btn blue lighten-2 waves-effect waves-light " >
                                            发 表
                                        </button>
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
                                <div class="col s2" style="padding:5px">
                                    <img  class="avatar_img_moment" src="{{ $momentVO->moment->Author->avatar }}" alt="Contact Person">
                                </div>
                                <div class="input-field col s2" style="padding-left: 0px;">
                                    <span class="blue-text lighten-2" style="font-size: 1em;font-weight:300">{{ $momentVO->moment->Author->nick_name }}</span><br>
                                    <span class="grey-text lighten-2" style="font-size: 1em;font-weight:300">@NanJing</span>
                                </div>
                                <div class="input-field col s6" style="padding-left: 0px;">
                                    <button data-target="{{$momentVO->moment->id.'modal'}}"
                                            class="right btn red lighten-1  modal-trigger white-text  waves-effect waves-light"
                                    >删除</button>
                                </div>
                            </div>
                            <hr style=" opacity:0.3;">
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
                                <label>
                                    <span class="text_post_date right">发表于&nbsp{{$momentVO->moment->created_at}}</span>
                                </label>
                            </div>
                        </div>

                        <div id="{{$momentVO->moment->id.'modal'}}" class="modal modal-fixed-footer">
                            <div class="modal-content">
                                <h3>动态删除提醒</h3>
                                <p>确定删除此动态吗？</p>
                            </div>
                            <div class="modal-footer">
                                <button class=" modal-action modal-close waves-effect waves-green btn-flat">否</button>
                                <button onclick="deleteMomentById( {{ Session::get('user')->id.",".$momentVO->moment->id }} )"
                                        class=" modal-action modal-close waves-effect waves-green btn-flat">是</button>
                            </div>
                        </div>

                @endforeach



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
                    欢迎注册并使用本网站 © 2016 Copyright
                </p>
            </div>
        </div>
    </div>
</footer>
<script type="text/javascript" src="{{URL::asset('js/jquery-2.2.4.min.js') }}"></script>
<script type="text/javascript" src="{{URL::asset('js/materialize.min.js') }}"></script>
<script type="text/javascript" src="{{URL::asset('js/moments_mine.js') }}"></script>
<script type="text/javascript" src="{{URL::asset('js/moments_board.js') }}"></script>
</body>
</html>