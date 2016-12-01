<!DOCTYPE html>
<html>
<head>
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/materialize.min.css') }}" media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/common.css') }}" media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/competition_board.css') }}" media="screen,projection"/>
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
                            <a class="dropdown-button" href="" data-activates='dropdown1'>
                                <div class="valign-wrapper">
                                    <img  class="valign  circle" style="width: 40px ; height: 40px;"  src="{{ Session::get('user')->avatar }} " alt="ME">
                                    <span class="valign white-text"> &nbsp {{ Session::get('user')->user_name }}</span>
                                    <i class="material-icons right">arrow_drop_down</i>
                                </div>
                            </a>
                        </li>
                        <!-- Dropdown Structure -->
                        <ul id='dropdown1' class='dropdown-content'>
                            <li><a href="user_stats.html">我的账号</a></li>
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
        <div class="col s12  m10 l8 offset-l2 " style="padding: 5px;">
            <!--二级功能按钮-->
            <hr>
            <div class="row white" style="margin: 0px" >
                <div class="col s1 offset-s5">
                    <a href="competition_board.html" >
                        <span class="blue-text center-align waves-effect waves-light">竞赛场</span>
                    </a>
                </div>
                <div class="col s1 ">
                    <a href="" >
                        <span class="blue-text center-align waves-effect waves-light">我的竞赛</span>
                    </a>
                </div>
            </div>
            <hr>


            <div class="row ">

                <div class="col s10 " >
                    <!--Competitions list here-->
                    <div id="individual" class="section scrollspy">
                        <!--Header-->
                        <div class="row">
                            <div class="col s6">
                                <span class="black-text lighten-2" style="font-size: 1.5em" >个人竞赛</span>
                            </div>
                        </div>
                        <!--List-->
                        <div class="row">
                            <div class="col s12">
                                @for($i=0; $i<count($idvCmptVOs);$i++)
                                    @if( !($idvCmptVOs[$i]->hasBegun) )
                                        <!--Individual Waiting-->
                                            <div class="card center-align" style="padding: 0px">
                                                <div class="row yellow white-text">
                                                    <div class="col s12">
                                                        <span class="text_compete">等待中</span>
                                                    </div>
                                                </div>
                                                <div class="card-content ">
                                                    <div class="row" style="margin-bottom: 0px">
                                                        <div class="col s12 m2 ">
                                                            <!--<span>Creator</span><br>-->
                                                            <img src="{{$idvCmptVOs[$i]->competition->author->avatar}}" class="avatar_img_competition circle">
                                                        </div>
                                                        <div class="col s12 m3 ">
                                                            <span>标题</span><br>
                                                            <p  style="margin: 0px">
                                                                <span class="text_compete">{{ $idvCmptVOs[$i]->competition->title}}</span>
                                                            </p>
                                                        </div>
                                                        <div class="col s12 m3">
                                                            <span>距离开始时间</span><br>
                                                            <span class="text_compete green-text">{{$idvCmptVOs[$i]->hour}}</span><span>h</span>
                                                            <span class="text_compete green-text">{{$idvCmptVOs[$i]->min}}</span><span>m</span>
                                                            <span class="text_compete green-text">{{$idvCmptVOs[$i]->sec}}</span><span>s</span>
                                                        </div>
                                                        <div class="col s12 m2">
                                                            <span>奖金</span><br>
                                                            <span class="text_compete yellow-text">{{$idvCmptVOs[$i]->competition->reward}}</span>
                                                        </div>
                                                        <div class="col s12 m2">
                                                            <span>发布时间</span><br>
                                                             {{$idvCmptVOs[$i]->createDate}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-action  " style="padding: 10px">
                                                    <div class="row" style="margin-bottom:0px">
                                                        <div class="col s2 offset-s8">
                                                            <a data-target="idv_players_modal"
                                                               class="btn-flat modal-trigger waves-effect waves-light">
                                                                竞赛成员
                                                            </a>
                                                        </div>
                                                        <div class="col s2 ">
                                                            <a class="btn-flat  waves-effect waves-light">
                                                                加入竞赛
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    @endif
                                    @if($idvCmptVOs[$i]->hasBegun)
                                        <!--Individual Begun-->
                                            <div class="card center-align" style="padding: 0px">
                                                <div class="row green white-text">
                                                    <div class="col s12">
                                                        <span class="text_compete">进行中</span>
                                                    </div>
                                                </div>
                                                <div class="card-content">
                                                    <div class="row" style="margin-bottom: 0px">
                                                        <div class="col s12 m2 ">
                                                            <!--<span>Creator</span><br>-->
                                                            <img src="{{$idvCmptVOs[$i]->competition->author->avatar}}" class="avatar_img_competition circle">
                                                        </div>
                                                        <div class="col s12 m3 ">
                                                            <span>标题</span><br>
                                                            <p  style="margin: 0px">
                                                                <span class="text_compete">{{ $idvCmptVOs[$i]->competition->title}}</span>
                                                            </p>
                                                        </div>
                                                        <div class="col s12 m3">
                                                            <span>距离结束时间</span><br>
                                                            <span class="text_compete green-text">{{$idvCmptVOs[$i]->hour}}</span><span>h</span>
                                                            <span class="text_compete green-text">{{$idvCmptVOs[$i]->min}}</span><span>m</span>
                                                            <span class="text_compete green-text">{{$idvCmptVOs[$i]->sec}}</span><span>s</span>
                                                        </div>
                                                        <div class="col s12 m2">
                                                            <span>奖金</span><br>
                                                            <span class="text_compete yellow-text">{{$idvCmptVOs[$i]->competition->reward}}</span>
                                                        </div>
                                                        <div class="col s12 m2">
                                                            <span>发布时间</span><br>
                                                            {{$idvCmptVOs[$i]->createDate}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-action  " style="padding: 10px">
                                                    <div class="row" style="margin-bottom:0px">
                                                        <div class="col s2 offset-s8">
                                                            <a data-target="idv_players_modal"
                                                               class="btn-flat modal-trigger waves-effect waves-light">
                                                                竞赛成员
                                                            </a>
                                                        </div>
                                                        <div class="col s2 ">
                                                            <a class="btn-flat  waves-effect waves-light">
                                                                加入竞赛
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    @endIf

                                    <!-- Modal Structure -->
                                    <div id="idv_players_modal" class="modal">
                                        <div class="modal-content">
                                            <ul class="collection">
                                                @for($j=0;$j<count($idvPlayers[$i]);$j++)
                                                    <li class="collection-item">
                                                        <div class="row" style="margin-bottom: 0px">
                                                            <div class="col s4" style="padding:5px">
                                                                <img  class="avatar_img_competition" src="{{ $idvPlayers[$i][$j]->user->avatar }}" alt="Contact Person">
                                                            </div>

                                                            <div class="input-field col s4" style="padding-left: 0px;">
                                                                <span class="text_stride" style="font-size: 1em;font-weight:300">步数:</span>
                                                                <span class="grey-text lighten-1" style="font-size: 1em;font-weight:300">{{ $idvPlayers[$i][$j]->stride_count }}</span>
                                                            </div>

                                                            <div class="input-field col s4" style="padding-left: 0px;">
                                                                <span class="text_rank" style="font-size: 1em;font-weight:300">名次:</span>
                                                                <span class="grey-text lighten-1" style="font-size: 1em;font-weight:300">{{ $j+1 }}</span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endfor
                                            </ul>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">确定</a>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                        </div>

                    </div>

                    <div id="team" class="section scrollspy">
                        <!--Header-->
                        <div class="row">
                            <div class="col s6">
                                <span class="black-text lighten-2" style="font-size: 1.5em" >团队竞赛</span>
                            </div>
                        </div>
                        <!--List-->
                        <div class="row">
                            <div class="col s12">
                            @for($i=0; $i<count($tmCmptVOs);$i++)
                                @if( !($tmCmptVOs[$i]->hasBegun) )
                                    <!--team Waiting-->
                                        <div class="card center-align" style="padding: 0px">
                                            <div class="row yellow white-text">
                                                <div class="col s12">
                                                    <span class="text_compete">等待中</span>
                                                </div>
                                            </div>
                                            <div class="card-content ">
                                                <div class="row" style="margin-bottom: 0px">
                                                    <div class="col s12 m2 ">
                                                        <!--<span>Creator</span><br>-->
                                                        <img src="{{$tmCmptVOs[$i]->competition->author->avatar}}" class="avatar_img_competition circle">
                                                    </div>
                                                    <div class="col s12 m3 ">
                                                        <span>标题</span><br>
                                                        <p  style="margin: 0px">
                                                            <span class="text_compete">{{ $tmCmptVOs[$i]->competition->title}}</span>
                                                        </p>
                                                    </div>
                                                    <div class="col s12 m3">
                                                        <span>距离开始时间</span><br>
                                                        <span class="text_compete green-text">{{$tmCmptVOs[$i]->hour}}</span><span>h</span>
                                                        <span class="text_compete green-text">{{$tmCmptVOs[$i]->min}}</span><span>m</span>
                                                        <span class="text_compete green-text">{{$tmCmptVOs[$i]->sec}}</span><span>s</span>
                                                    </div>
                                                    <div class="col s12 m2">
                                                        <span>奖金</span><br>
                                                        <span class="text_compete yellow-text">{{$tmCmptVOs[$i]->competition->reward}}</span>
                                                    </div>
                                                    <div class="col s12 m2">
                                                        <span>发布时间</span><br>
                                                        {{$tmCmptVOs[$i]->createDate}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-action  " style="padding: 10px">
                                                <div class="row" style="margin-bottom:0px">
                                                    <div class="col s2 offset-s8">
                                                        <a data-target="tm_players_modal"
                                                           class="btn-flat modal-trigger waves-effect waves-light">
                                                            竞赛成员
                                                        </a>
                                                    </div>
                                                    <div class="col s2 ">
                                                        <a class="btn-flat  waves-effect waves-light">
                                                            加入竞赛
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                @endif
                                @if($tmCmptVOs[$i]->hasBegun)
                                    <!--team Begun-->
                                        <div class="card center-align" style="padding: 0px">
                                            <div class="row green white-text">
                                                <div class="col s12">
                                                    <span class="text_compete">进行中</span>
                                                </div>
                                            </div>
                                            <div class="card-content">
                                                <div class="row" style="margin-bottom: 0px">
                                                    <div class="col s12 m2 ">
                                                        <!--<span>Creator</span><br>-->
                                                        <img src="{{$tmCmptVOs[$i]->competition->author->avatar}}" class="avatar_img_competition circle">
                                                    </div>
                                                    <div class="col s12 m3 ">
                                                        <span>标题</span><br>
                                                        <p  style="margin: 0px">
                                                            <span class="text_compete">{{ $tmCmptVOs[$i]->competition->title}}</span>
                                                        </p>
                                                    </div>
                                                    <div class="col s12 m3">
                                                        <span>距离结束时间</span><br>
                                                        <span class="text_compete green-text">{{$tmCmptVOs[$i]->hour}}</span><span>h</span>
                                                        <span class="text_compete green-text">{{$tmCmptVOs[$i]->min}}</span><span>m</span>
                                                        <span class="text_compete green-text">{{$tmCmptVOs[$i]->sec}}</span><span>s</span>
                                                    </div>
                                                    <div class="col s12 m2">
                                                        <span>奖金</span><br>
                                                        <span class="text_compete yellow-text">{{$tmCmptVOs[$i]->competition->reward}}</span>
                                                    </div>
                                                    <div class="col s12 m2">
                                                        <span>发布时间</span><br>
                                                        {{$tmCmptVOs[$i]->createDate}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-action  " style="padding: 10px">
                                                <div class="row" style="margin-bottom:0px">
                                                    <div class="col s2 offset-s8">
                                                        <a data-target="tm_players_modal"
                                                           class="btn-flat modal-trigger waves-effect waves-light">
                                                            竞赛成员
                                                        </a>
                                                    </div>
                                                    <div class="col s2 ">
                                                        <a class="btn-flat  waves-effect waves-light">
                                                            加入竞赛
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                @endIf

                                    <!-- Modal Structure -->
                                        <div id="tm_players_modal" class="modal wider">
                                            <div class="modal-content">
                                                <div class = "row center-align">
                                                    <div class="col s6 ">
                                                        <span class="text_red_team" >队伍1</span>
                                                    </div>
                                                    <div class="col s6">
                                                        <span class="text_blue_team" >队伍2</span>
                                                    </div>
                                                </div>
                                                <div class = "row">
                                                    <div class = "col s6">
                                                        <ul class="collection">
                                                            @for($j=0;$j<count($teamPlayers[$i]);$j++)
                                                                @if($teamPlayers[$i][$j]->team == 'red')
                                                                    <li class="collection-item">
                                                                        <div class="row" style="margin-bottom: 0px">
                                                                            <div class="col s4" style="padding:5px">
                                                                                <img  class="avatar_img_competition" src="{{ $teamPlayers[$i][$j]->user->avatar }}" alt="Contact Person">
                                                                            </div>

                                                                            <div class="input-field col s4" style="padding-left: 0px;">
                                                                                <span class="text_stride" style="font-size: 1em;font-weight:300">步数:</span>
                                                                                <span class="grey-text lighten-1" style="font-size: 1em;font-weight:300">{{ $teamPlayers[$i][$j]->stride_count }}</span>
                                                                            </div>

                                                                            <div class="input-field col s4" style="padding-left: 0px;">
                                                                                <span class="text_rank" style="font-size: 1em;font-weight:300">名次:</span>
                                                                                <span class="grey-text lighten-1" style="font-size: 1em;font-weight:300">{{ $j+1 }}</span>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                @endif
                                                            @endfor
                                                        </ul>
                                                    </div>
                                                    <div class = "col s6">
                                                        <ul class="collection">
                                                            @for($j=0;$j<count($teamPlayers[$i]);$j++)
                                                                @if($teamPlayers[$i][$j]->team == 'blue')
                                                                    <li class="collection-item">
                                                                        <div class="row" style="margin-bottom: 0px">
                                                                            <div class="col s4" style="padding:5px">
                                                                                <img  class="avatar_img_competition" src="{{ $teamPlayers[$i][$j]->user->avatar }}" alt="Contact Person">
                                                                            </div>

                                                                            <div class="input-field col s4" style="padding-left: 0px;">
                                                                                <span class="text_stride" style="font-size: 1em;font-weight:300">步数:</span>
                                                                                <span class="grey-text lighten-1" style="font-size: 1em;font-weight:300">{{ $teamPlayers[$i][$j]->stride_count }}</span>
                                                                            </div>

                                                                            <div class="input-field col s4" style="padding-left: 0px;">
                                                                                <span class="text_rank" style="font-size: 1em;font-weight:300">名次:</span>
                                                                                <span class="grey-text lighten-1" style="font-size: 1em;font-weight:300">{{ $j+1 }}</span>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                @endif
                                                            @endfor
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">确定</a>
                                            </div>
                                        </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>

                <!--SideBar Navi-->
                <div class="col s2">
                    <div class="pinned">
                        <br>
                        <a href="">
                            <span class="grey-text lighten-5" style="font-size: 1.2em;font-weight: 300" >竞赛类型</span>
                        </a>
                        <hr style=" opacity:0.3;">
                        <ul class="section table-of-contents" style="margin-top: 0px;padding-top:0px;">
                            <li>
                                <a href="#individual">
                                    <span >个人竞赛</span>
                                </a>
                            </li>
                            <li>
                                <a href="#team">
                                    <span >团队竞赛</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

        <!--Add Button-->
        <div class="col s12 m2 l2">
            <div class="fixed-action-btn horizontal" style="bottom: 45px; right: 24px;">
                <a class="btn-floating btn-large blue  ">
                    <i class="large material-icons">mode_edit</i>
                </a>
                <ul>
                    <li><a class="modal-trigger btn-floating red lighten-1" href="#indvlComp" ><i><img src="icon/i_24px/runner1.png"></i></a></li>
                    <li><a class="modal-trigger btn-floating orange lighten-1" href="#teamComp"><i><img  src="icon/i_24px/group-of-men-running.png"></i></a></li>
                </ul>
            </div>

        </div>
    </div>


    <!-- Modal Structure -->
    <div id="indvlComp" class="modal" style="max-width: 600px; ">
        <div class="modal-content">
            <!--基础信息-->
            <div class="row">
                <span class="right grey-text lighten-1" style="font-size: 1.5em;font-weight: 300" >个人竞赛</span>
                <br>
                <form class="col s10 offset-s1 black-text">
                    <div class="row" style="margin:0px">
                        <div class="input-field col s6">
                            <input  id="i_compName" type="text" class="validate" >
                            <label for="i_compName">标题</label>
                        </div>
                    </div>


                    <div class="row" style="margin-bottom: 0px">
                        <div class="col s12">
                            <span class="grey-text lighten-2">Type</span>

                        </div>
                    </div>
                    <div class="row" >
                        <div class="input-field col s12 m6 l6" style="margin-top: 0px" >
                            <p>
                                <input checked="checked" name="privacy" type="radio" id="i_public" />
                                <label for="i_public">公开</label>
                            </p>
                        </div>
                        <div class="input-field col s12 m6 l6" style="margin-top: 0px">
                            <p>
                                <input name="privacy" type="radio" id="i_private" />
                                <label for="i_private">私有</label>
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <textarea  id="i_intro" class="materialize-textarea"></textarea>
                            <label for="i_intro">介绍</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s6">
                            <label for="i_begin">开始时间</label>
                            <br>
                            <input id="i_begin" type="date" class="datepicker">
                        </div>

                        <div class="input-field col s6">
                            <label for="i_end">结束时间</label>
                            <br>
                            <input id="i_end" type="date" class="datepicker">
                        </div>
                    </div>


                    <div class="row">
                        <div class="input-field col s4 offset-s4">
                            <button class="btn yellow lighten-2 waves-effect waves-light " type="submit" name="action">
                                发布
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="teamComp"  class="modal" style="max-width: 600px; ">
        <div class="modal-content">
            <!--基础信息-->
            <div class="row">
                <span class="right grey-text lighten-1" style="font-size: 1.5em;font-weight: 300" >团队竞赛</span>
                <br>
                <form class="col s10 offset-s1 black-text">
                    <div class="row" style="margin:0px">
                        <div class="input-field col s6">
                            <input  id="t_compName" type="text" class="validate" >
                            <label for="t_compName">标题</label>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 0px">
                        <div class="col s12">
                            <span class="grey-text lighten-2">Type</span>

                        </div>
                    </div>
                    <div class="row" >
                        <div class="input-field col s12 m6 l6" style="margin-top: 0px" >
                            <p>
                                <input checked="checked" name="privacy" type="radio" id="t_public" />
                                <label for="t_public">公有</label>
                            </p>
                        </div>
                        <div class="input-field col s12 m6 l6" style="margin-top: 0px">
                            <p>
                                <input name="privacy" type="radio" id="t_private" />
                                <label for="t_private">私有</label>
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s6">
                            <label for="t_begin">From</label>
                            <br>
                            <input id="t_begin" type="date" class="datepicker">
                        </div>
                        <div class="input-field col s6">
                            <label for="t_end">To</label>
                            <br>
                            <input id="t_end" type="date" class="datepicker">
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 0px">
                        <div class="col s12">
                            <span class="grey-text lighten-2">队伍人数</span>
                        </div>
                    </div>
                    <div class="row" >
                        <div class="input-field col s12 m4 l4" style="margin-top: 0px" >
                            <p>
                                <input checked="checked" name="number" type="radio" id="three" />
                                <label for="t_public">3</label>
                            </p>
                        </div>
                        <div class="input-field col s12 m4 l4" style="margin-top: 0px">
                            <p>
                                <input name="number" type="radio" id="five" />
                                <label for="t_private">5</label>
                            </p>
                        </div>
                        <div class="input-field col s12 m4 l4" style="margin-top: 0px">
                            <p>
                                <input name="number" type="radio" id="ten" />
                                <label for="t_private">10</label>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea  id="t_intro" class="materialize-textarea"></textarea>
                            <label for="t_intro">介绍</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s4 offset-s4">
                            <button class="btn yellow lighten-2 waves-effect waves-light " type="submit" name="action">
                                发布
                            </button>
                        </div>
                    </div>
                </form>
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
<script type="text/javascript" src="{{URL::asset('js/date_picker/picker.date.js') }}"></script>
<script type="text/javascript" src="{{URL::asset('js/date_picker/picker.js') }}"></script>
<script type="text/javascript" src="{{URL::asset('js/competition_board.js') }}"></script>
</body>
</html>