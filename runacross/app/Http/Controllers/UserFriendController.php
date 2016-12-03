<?php

namespace App\Http\Controllers;

use App\Friend;
use App\User;
use Illuminate\Http\Request;
use Log;

class UserFriendController extends Controller
{
    protected $User;
    protected $Friend;

    public function __construct( User $user, Friend $friend)
    {
        $this->User = $user;
        $this->Friend = $friend;
    }


    /*返回所有与用户有关的用户列表，包括被用户关注的人followees和关注用户的人followers*/
    public function getUserFriends($userId){
      //  $followerIds = $this->Friend->getFollowerIds($userId);
        $followeeIds = $this->Friend->getFolloweeIds($userId);

      //  $followers = $this->User->getUserByIds($followerIds);
        $followees = $this->User->getUserByIds($followeeIds);
        return view('user_friend',['followees'=>$followees]);
    }


    public function search($keyword){

    }

    public function follow($userId,$watchId){

    }

    public function unfollow($userId,$watchId){

    }
}
