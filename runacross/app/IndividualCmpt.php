<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndividualCmpt extends Model
{

    /**
     * 关联到模型的数据表
     *
     *
     */
    protected $table = 'individual_competition';
    public $timestamps = false;



    /**
     * @param $id 竞赛Id
     */
    public function getMembers($id){
        $users = IndividualCmpt::
                join('user', 'user.id', '=', 'individual_competition.user_id')
                ->where('competition_id',$id)
                ->orderBy('stride_count','desc')
                ->get();

        return $users;
    }

    /**
     * 获取个人竞赛的比赛结果,返回每个成员的奖金，里程数，按里程数降序排序
     * @param $id 竞赛Id
     */
    public function getResult($id){

    }
}
