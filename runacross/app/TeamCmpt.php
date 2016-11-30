<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamCmpt extends Model
{

    /**
     * 关联到模型的数据表
     *
     *
     */
    protected $table = 'team_competition';
    public $timestamps = false;

    /**
     *
     * @param $id 竞赛Id
     * 返回Red Team
     */
    public function getRedTeamMembers($id){



    }

    /**
     * @param $id 竞赛Id
     * 返回Red Team
     */
    public function getBlueTeamMembers($id){

    }


    /**
     * 获取团队竞赛的比赛结果,返回获胜队伍每个成员的奖金，里程数，按里程数降序排序
     * @param $id 竞赛Id
     */
    public function getResult($id){

    }

}
