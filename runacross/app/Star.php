<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Star extends Model
{
    /**
     * 关联到模型的数据表
     *
     *
     */
    protected $table = 'star';
    public $timestamps = false;

    public function hasVote($momentId , $userId){
        $record = Star::where('moment_id',$momentId)->where('user_id',$userId)->first();
        if($record==null){
            return false;
        }

        return true;
    }

    public function getVoteCount($momentId ){
        $count = Star::where('moment_id',$momentId)->count();
        return $count;
    }

    public function vote($momentId , $userId){
        $record = new Star();
        $record->user_id = $userId;
        $record->moment_id = $momentId;
        $record->save();
    }

    public function unVote($momentId , $userId){
        $record = Star::where('moment_id',$momentId)->where('user_id',$userId)->delete();
    }
}
