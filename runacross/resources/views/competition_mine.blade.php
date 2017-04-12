<!DOCTYPE html>
<html>
<head>
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/materialize.min.css') }}" media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/common.css') }}" media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/competition_board.css') }}" media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/competition_mine.css') }}" media="screen,projection"/>
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
                <li class="tab col s3"><a target="_self" class="active" href="/user/{{Session::get('user')->id}}/competitions">我的竞赛</a></li>
                <li class="tab col s3"><a target="_self"  href="/competitions/creation">新建竞赛</a></li>
            </ul>
        </div>
    </div>
    <div class="row white">
        <!--Content Board-->
        <div class="col s12  m10 l8 offset-l2 " style="padding: 5px;">
            <div class="row ">
                <div class="col s10 " >
                    <!--Competitions list here-->
                    <div id="created" class="section scrollspy">
                        <!--Header-->
                        <div class="row">
                            <div class="col s6">
                                <span class="black-text lighten-2" style="font-size: 1.5em" >我创建的</span>
                            </div>
                        </div>
                        <!--Created Competitions List-->
                        @if($createdVOs!=null && count($createdVOs)>0)
                        <div class="row">
                            <div class="col s12">
                                @for($i=0; $i<count($createdVOs);$i++)
                                    <div class="card" id="{{$createdVOs[$i]->cmptVO->competition->id}}" style="margin-bottom: 0px">
                                        <!--Avatar here-->
                                        <div class="row" style="margin-bottom: 0px">
                                            <div class="col s4 l2" style="padding:5px">
                                                <img  class="avatar_img_competition" src="{{$createdVOs[$i]->cmptVO->competition->author->avatar}}" alt="Contact Person">
                                            </div>
                                            <div class="input-field col s8 l10 left-align" style="padding-left: 0px;">
                                                <span class="blue-text lighten-2 text_avatar" >{{ $createdVOs[$i]->cmptVO->competition->author->nick_name }}</span><br>
                                                <span class="grey-text lighten-2 text_avatar" >{{ $createdVOs[$i]->cmptVO->created_at }}</span>
                                            </div>
                                        </div>

                                        <!--img here-->
                                        @if($createdVOs[$i]->cmptVO->competition->picture!=null)
                                            <div class="card-image">
                                                <img src="{{$createdVOs[$i]->cmptVO->competition->picture}}">
                                            </div>
                                        @endif
                                        <div class="card-content ">
                                            <div class="row">
                                                <div class="row" >
                                                    <div class="col-s12 l12">
                                                        <p class="text_compete">{{ $createdVOs[$i]->cmptVO->competition->title}}</p>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 0px">
                                                    <div class="col s12 l12 " style="padding-left: 0px">
                                                        {{--类别--}}
                                                        <div class="chip">
                                                            <div class="valign-wrapper">
                                                                <i class=" material-icons">person</i>
                                                                @if( $createdVOs[$i]->cmptVO->competition->type=='individual')
                                                                    <span class="text_compete">个人竞赛</span>
                                                                @endif
                                                                @if( $createdVOs[$i]->cmptVO->competition->type=='team')
                                                                    <span class="text_compete">团队竞赛</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        {{--奖金--}}
                                                        <div class="chip">
                                                            <div class="valign-wrapper">
                                                                <i class=" material-icons">attach_money</i> <span class="text_compete">{{$createdVOs[$i]->cmptVO->competition->reward}}</span>
                                                            </div>
                                                        </div>
                                                        {{--开始日期--}}
                                                        <div class="chip">
                                                            <div class="valign-wrapper">
                                                                <i class=" material-icons">alarm</i> <span class="text_compete">{{$createdVOs[$i]->cmptVO->start_at}}</span>
                                                            </div>
                                                        </div>
                                                        {{--结束日期--}}
                                                        <div class="chip">
                                                            <div class="valign-wrapper">
                                                                <i class=" material-icons">alarm</i> <span class="text_compete">{{$createdVOs[$i]->cmptVO->end_at}}</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="card-action  " style="padding: 10px">
                                            <div class="row" style="margin-bottom:0px">
                                                <div class="col s2 offset-s8">
                                                    <a data-target="{{'created'.$createdVOs[$i]->cmptVO->competition->id}}"
                                                       class="btn modal-trigger waves-effect waves-light">
                                                        竞赛成员
                                                    </a>
                                                </div>
                                                <div class="col s2 ">
                                                    <a onclick="deleteCmpt({{$createdVOs[$i]->cmptVO->competition->id}})"
                                                       class="btn  waves-effect waves-light">
                                                        取消竞赛
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @if( $createdVOs[$i]->cmptVO->competition->type=='individual' )
                                        <!-- Modal Structure -->
                                        {{--个人赛成员列表--}}
                                        <div id="{{'created'.$createdVOs[$i]->cmptVO->competition->id}}" class="modal">
                                            <div class="modal-content">
                                                <ul class="collection">
                                                    @for($j=0;$j<count($createdVOs[$i]->playerRecords);$j++)
                                                        <li class="collection-item">
                                                            <div class="row" style="margin-bottom: 0px">
                                                                <div class="col s4" style="padding:5px">
                                                                    <img  class="avatar_img_competition" src="{{ $createdVOs[$i]->playerRecords[$j]->user->avatar }}" alt="Contact Person">
                                                                </div>

                                                                <div class="input-field col s4" style="padding-left: 0px;">
                                                                    <span class="text_stride" style="font-size: 1em;font-weight:300">步数:</span>
                                                                    <span class="grey-text lighten-1" style="font-size: 1em;font-weight:300">{{ $createdVOs[$i]->playerRecords[$j]->stride_count }}</span>
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
                                    @endif
                                    @if( $createdVOs[$i]->cmptVO->competition->type=='team' )
                                        <!-- Modal Structure -->
                                        {{--团队赛成员列表--}}
                                        <div id="{{'created'.$createdVOs[$i]->cmptVO->competition->id}}" class="modal wider">
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
                                                            @for($j=0;$j<count($createdVOs[$i]->playerRecords);$j++)
                                                                @if($createdVOs[$i]->playerRecords[$j]->team == 'red')
                                                                    <li class="collection-item">
                                                                        <div class="row" style="margin-bottom: 0px">
                                                                            <div class="col s4" style="padding:5px">
                                                                                <img  class="avatar_img_competition" src="{{ $createdVOs[$i]->playerRecords[$j]->user->avatar }}" alt="Contact Person">
                                                                            </div>

                                                                            <div class="input-field col s4" style="padding-left: 0px;">
                                                                                <span class="text_stride" style="font-size: 1em;font-weight:300">步数:</span>
                                                                                <span class="grey-text lighten-1" style="font-size: 1em;font-weight:300">{{ $createdVOs[$i]->playerRecords[$j]->stride_count }}</span>
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
                                                            @for($j=0;$j<count($createdVOs[$i]->playerRecords);$j++)
                                                                @if($createdVOs[$i]->playerRecords[$j]->team == 'blue')
                                                                    <li class="collection-item">
                                                                        <div class="row" style="margin-bottom: 0px">
                                                                            <div class="col s4" style="padding:5px">
                                                                                <img  class="avatar_img_competition" src="{{$createdVOs[$i]->playerRecords[$j]->user->avatar }}" alt="Contact Person">
                                                                            </div>

                                                                            <div class="input-field col s4" style="padding-left: 0px;">
                                                                                <span class="text_stride" style="font-size: 1em;font-weight:300">步数:</span>
                                                                                <span class="grey-text lighten-1" style="font-size: 1em;font-weight:300">{{ $createdVOs[$i]->playerRecords[$j]->stride_count }}</span>
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
                                    @endif

                                @endfor
                            </div>
                        </div>
                        @endif
                    </div>
                    <div id="participated" class="section scrollspy">
                        <!--Header-->
                        <div class="row">
                            <div class="col s6">
                                <span class="black-text lighten-2" style="font-size: 1.5em" >我参与的</span>
                            </div>
                        </div>
                        {{--<!--Joined Competitions List-->--}}

                        @if($joinedVOs!=null&&count($joinedVOs)>0)
                        <div class="row">
                            <div class="col s12">
                                @for($i=0; $i<count($joinedVOs);$i++)
                                    <div class="card" id="{{$joinedVOs[$i]->cmptVO->competition->id}}" style="margin-bottom: 0px">
                                        <!--Avatar here-->
                                        <div class="row" style="margin-bottom: 0px">
                                            <div class="col s4 l2" style="padding:5px">
                                                <img  class="avatar_img_competition" src="{{$joinedVOs[$i]->cmptVO->competition->author->avatar}}" alt="Contact Person">
                                            </div>
                                            <div class="input-field col s8 l10 left-align" style="padding-left: 0px;">
                                                <span class="blue-text lighten-2 text_avatar" >{{ $joinedVOs[$i]->cmptVO->competition->author->nick_name }}</span><br>
                                                <span class="grey-text lighten-2 text_avatar" >{{ $joinedVOs[$i]->cmptVO->created_at }}</span>
                                            </div>
                                        </div>

                                        <!--img here-->
                                        @if($joinedVOs[$i]->cmptVO->competition->picture!=null)
                                            <div class="card-image">
                                                <img src="{{$joinedVOs[$i]->cmptVO->competition->picture}}">
                                            </div>
                                        @endif
                                        <div class="card-content ">
                                            <div class="row">
                                                <div class="row" >
                                                    <div class="col-s12 l12">
                                                        <p class="text_compete">{{ $joinedVOs[$i]->cmptVO->competition->title}}</p>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 0px">
                                                    <div class="col s12 l12 " style="padding-left: 0px">

                                                        <div class="chip">
                                                            <div class="valign-wrapper">
                                                                <i class=" material-icons">person</i>
                                                                @if( $joinedVOs[$i]->cmptVO->competition->type=='individual')
                                                                    <span class="text_compete">个人竞赛</span>
                                                                @endif
                                                                @if( $joinedVOs[$i]->cmptVO->competition->type=='team')
                                                                    <span class="text_compete">团队竞赛</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="chip">
                                                            <div class="valign-wrapper">
                                                                <i class=" material-icons">attach_money</i> <span class="text_compete">{{$joinedVOs[$i]->cmptVO->competition->reward}}</span>
                                                            </div>
                                                        </div>

                                                        <div class="chip">
                                                            <div class="valign-wrapper">
                                                                <i class=" material-icons">alarm</i> <span class="text_compete">{{$joinedVOs[$i]->cmptVO->start_at}}</span>
                                                            </div>
                                                        </div>

                                                        <div class="chip">
                                                            <div class="valign-wrapper">
                                                                <i class=" material-icons">alarm</i> <span class="text_compete">{{$joinedVOs[$i]->cmptVO->end_at}}</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="card-action  " style="padding: 10px">
                                            <div class="row" style="margin-bottom:0px">
                                                <div class="col s2 offset-s8">
                                                    <a data-target="{{'joined'.$joinedVOs[$i]->cmptVO->competition->id}}"
                                                       class="btn modal-trigger waves-effect waves-light">
                                                        竞赛成员
                                                    </a>
                                                </div>
                                                <div class="col s2 ">
                                                    <a onclick="quitCmpt( {{ $joinedVOs[$i]->cmptVO->competition->id.",".Session::get('user')->id }} )"
                                                       class="btn waves-effect waves-light">
                                                        退出竞赛
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @if($joinedVOs[$i]->cmptVO->competition->type=='individual')
                                    <!-- Modal Structure -->
                                    {{--个人赛成员列表--}}
                                    <div id="{{'joined'.$joinedVOs[$i]->cmptVO->competition->id}}" class="modal">
                                        <div class="modal-content">
                                            <ul class="collection">
                                                @for($j=0;$j<count($joinedVOs[$i]->playerRecords);$j++)
                                                    <li class="collection-item">
                                                        <div class="row valign-wrapper" style="margin-bottom: 0px">
                                                            <div class="col s4" style="padding:5px">
                                                                <img  class="avatar_member" src="{{ $joinedVOs[$i]->playerRecords[$j]->user->avatar }}" alt="Contact Person">
                                                            </div>

                                                            <div class=" col s4" style="padding-left: 0px;">
                                                                <span class="text_stride" style="font-size: 1em;font-weight:300">步数:</span>
                                                                <span class="grey-text lighten-1" style="font-size: 1em;font-weight:300">{{ $joinedVOs[$i]->playerRecords[$j]->stride_count }}</span>
                                                            </div>

                                                            <div class="col s4" style="padding-left: 0px;">
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
                                    @endif

                                    @if($joinedVOs[$i]->cmptVO->competition->type=='team')
                                    <!-- Modal Structure -->
                                    {{--团队赛成员列表--}}
                                    <div id="{{'joined'.$joinedVOs[$i]->cmptVO->competition->id}}" class="modal wider">
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
                                                        @for($j=0;$j<count($joinedVOs[$i]->playerRecords);$j++)
                                                            @if($joinedVOs[$i]->playerRecords[$j]->team == 'red')
                                                                <li class="collection-item">
                                                                    <div class="row valign-wrapper" style="margin-bottom: 0px">
                                                                        <div class="col s4" style="padding:5px">
                                                                            <img  class="avatar_member" src="{{ $joinedVOs[$i]->playerRecords[$j]->user->avatar }}" alt="Contact Person">
                                                                        </div>

                                                                        <div class="col s4" style="padding-left: 0px;">
                                                                            <span class="text_stride" style="font-size: 1em;font-weight:300">步数:</span>
                                                                            <span class="grey-text lighten-1" style="font-size: 1em;font-weight:300">{{ $joinedVOs[$i]->playerRecords[$j]->stride_count }}</span>
                                                                        </div>

                                                                        <div class="col s4" style="padding-left: 0px;">
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
                                                        @for($j=0;$j<count($joinedVOs[$i]->playerRecords);$j++)
                                                            @if($joinedVOs[$i]->playerRecords[$j]->team == 'blue')
                                                                <li class="collection-item">
                                                                    <div class="row valign-wrapper" style="margin-bottom: 0px">
                                                                        <div class="col s4" style="padding:5px">
                                                                            <img  class="avatar_member" src="{{$joinedVOs[$i]->playerRecords[$j]->user->avatar }}" alt="Contact Person">
                                                                        </div>

                                                                        <div class=" col s4" style="padding-left: 0px;">
                                                                            <span class="text_stride" style="font-size: 1em;font-weight:300">步数:</span>
                                                                            <span class="grey-text lighten-1" style="font-size: 1em;font-weight:300">{{ $joinedVOs[$i]->playerRecords[$j]->stride_count }}</span>
                                                                        </div>

                                                                        <div class=" col s4" style="padding-left: 0px;">
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
                                    @endif
                                @endfor
                            </div>
                        </div>
                        @endif
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
                                <a href="#created">
                                    <span >我创建的</span>
                                </a>
                            </li>
                            <li>
                                <a href="#participated">
                                    <span >我参与的</span>
                                </a>
                            </li>
                        </ul>
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
<script type="text/javascript" src="{{URL::asset('js/competition_mine.js') }}"></script>
</body>
</html>