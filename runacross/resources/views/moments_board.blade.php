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
                        <li class="active"><a href="moments_board.html"><span class="white-text center-align">动态</span></a></li>
                        <li><a href="competition_board.html"><span class="white-text center-align">竞赛</span></a></li>
                        <li >
                            <a class="dropdown-button" href="" data-activates='dropdown1'>
                                <div class="valign-wrapper">
                                    <img  class="valign  circle" style="width: 40px ; height: 40px;"  src="img/avatar.jpeg" alt="ME">
                                    <span class="valign white-text">Shuo</span>
                                    <i class="material-icons right">arrow_drop_down</i>
                                </div>
                            </a>
                        </li>
                        <!-- Dropdown Structure -->
                        <ul id='dropdown1' class='dropdown-content'>
                            <li><a href="user_stats.html">我的账号</a></li>
                            <li class="divider"></li>
                            <li><a href="#!">登出</a></li>
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
                    <a href="moments_board.html" >
                        <span class="blue-text center-align waves-effect waves-light">动态板</span>
                    </a>
                </div>
                <div class="col s1 ">
                    <a href="moments_mine.html" >
                        <span class="blue-text center-align waves-effect waves-light">我的动态</span>
                    </a>
                </div>
            </div>
            <hr>

            <div class="row ">
                <!--Moments Create board and list-->
                <div class="col s12 m12 l8" >
                    <!--Post new moment board-->
                    <div class="card white">
                        <div class="card-content black-text">
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
                                            <img class="avatar_img_create" src="img/avatar.jpeg" alt="Contact Person">
                                        </div>
                                        <div class="input-field col s12 m12 l10">
                                            <label for="textarea1">想说点什么?</label>
                                            <textarea id="textarea1" class="materialize-textarea" style="padding: 5px"></textarea>
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
                                <div class="col s12">
                                    <a class="right blue lighten-2 waves-effect waves-light btn">Post</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Moments come here-->
                    <div class="card">
                        <!--Avatar here-->
                        <div class="row" style="margin-bottom: 0px">
                            <div class="col s12 m12 l2" style="padding:5px">
                                <img  class="avatar_img_moment" src="img/avatar1.png" alt="Contact Person">
                            </div>
                            <div class="input-field col s12 m12 l10" style="padding-left: 0px;">
                                <span class="blue-text lighten-2" style="font-size: 1em;font-weight:300">Newton</span><br>
                                <span class="grey-text lighten-2" style="font-size: 1em;font-weight:300">@NanJing</span>
                            </div>
                        </div>
                        <hr style=" opacity:0.3;">
                        <!--img here-->
                        <div class="card-image">
                            <img src="img/c1.jpg">
                        </div>
                        <!--discription here-->
                        <div class="card-content">
                            <p>I am a very simple card. I am good at containing small bits of information.
                                I am convenient because I require little markup to use effectively.</p>
                        </div>
                        <!--Actions here-->
                        <div class="card-action">
                            <label>
                                <i class="material-icons">thumb_up</i>
                                <span style="font-size: 2.2em;">18</span>
                            </label>
                        </div>
                    </div>



                    <div class="card">
                        <!--Avatar here-->
                        <div class="row" style="margin-bottom: 0px">
                            <div class="col s12 m12 l2" style="padding:5px">
                                <img  class="avatar_img_moment" src="img/avatar2.jpg" alt="Contact Person">
                            </div>
                            <div class="input-field col s12 m12 l10" style="padding-left: 0px;">
                                <span class="blue-text lighten-2" style="font-size: 1em;font-weight:300">Newton</span><br>
                                <span class="grey-text lighten-2" style="font-size: 1em;font-weight:300">@NanJing</span>
                            </div>
                        </div>
                        <hr style=" opacity:0.3;">
                        <!--img here-->
                        <div class="card-image">
                            <img src="img/c2.jpg">
                        </div>
                        <!--discription here-->
                        <div class="card-content">
                            <p>I am a very simple card. I am good at containing small bits of information.
                                I am convenient because I require little markup to use effectively.</p>
                        </div>
                        <!--Actions here-->
                        <div class="card-action">
                            <label>
                                <i class="material-icons">thumb_up</i>
                                <span style="font-size: 2.2em;">16</span>
                            </label>
                        </div>
                    </div>
                </div>

                <!--TODO Suggested Or Rank-->
                <div class="col s12 m12 l4">
                    <div class="card z-depth-0">

                        <span class="blue-text lighten-2" style="font-size: 1.2em;font-weight:300">推荐动态</span>

                        <div class="card">
                            <div class="card-image" >
                                <img src="img/c3.jpg" alt="Contact Person" style="max-height:400px;">
                            </div>
                            <div class="card-content">
                                <p>I am a very simple card. I am good at containing small bits of information.
                                    I am convenient because I require little markup to use effectively.</p>
                            </div>
                            <div class="card-action">

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</main>


<script type="text/javascript" src="{{URL::asset('js/jquery-2.2.4.min.js') }}"></script>
<script type="text/javascript" src="{{URL::asset('js/materialize.min.js') }}"></script>
</body>
</html>