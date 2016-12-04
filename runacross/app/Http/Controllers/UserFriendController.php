<?php

namespace App\Http\Controllers;

use App\Friend;
use App\Record;
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
        return view('user_friend',['followees'=>$followees ,'result'=>null]);
    }


    public function search(Request $request){
        $keyword=$request->input('nick_name');
        Log::info('nick_name'.$keyword);
        $userId = $request->session()->get('user')->id;
        $followeeIds = $this->Friend->getFolloweeIds($userId);
        $followees = $this->User->getUserByIds($followeeIds);
        $result = $this->User->searchUserByNickName($userId,$keyword);
        return view('user_friend',['followees'=>$followees ,'result'=>$result]);
    }

    public function follow($userId,$watchId){
        $this->Friend->follow($userId,$watchId);

        return ['result'=>true];
    }

    public function unfollow($userId,$watchId){
        $this->Friend->unfollow($userId,$watchId);

        return ['result'=>true];


    }
}
