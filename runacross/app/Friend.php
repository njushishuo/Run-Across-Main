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

    public function getAllFriendsIdByUserId($userId){

        $friendsIdList = Friend::select('follow_id')->where('user_id',$userId)->get();

        return $friendsIdList;

    }


}
