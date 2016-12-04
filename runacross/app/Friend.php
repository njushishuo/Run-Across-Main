<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    /**
     * 关联到模型的数据表
     *
     *
     */
    protected $table = 'friendship';
    public $timestamps = false;

    /*---------------moment------------------------------------------------------*/
    public function getAllFriendsIdByUserId($userId){

        $friendsIdList = Friend::select('follow_id')->where('user_id',$userId)->get();

        return $friendsIdList;

    }

    /*--------------Friend Board-------------------------------------------------*/

    /**
     * 获得观察用户的人
     * @param $userId
     */
    public function getFollowerIds($userId){
        $followers = Friend::select('user_id')->where('follow_id',$userId)->get();
        return $followers;
    }

    /**
     *获得被用户观察的人
     * @param $userId
     */
    public function getFolloweeIds($userId){
        $followees = Friend::select('follow_id')->where('user_id',$userId)->get();
        return $followees;
    }


    public function  unfollow($userId, $followId){

        Friend::where('user_id',$userId)->where('follow_id',$followId)->delete();
    }

    public function  follow($userId, $followId){

        $record =new Friend();
        $record->user_id = $userId;
        $record->follow_id = $followId;
        $record->save();
    }


}
