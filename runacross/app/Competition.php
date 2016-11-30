<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    /**
     * 关联到模型的数据表
     *
     *
     */
    protected $table = 'competition';
    public $timestamps = false;

    /**
     * 返回系统中全部的活跃中的个人竞赛(尚未开始与尚未结束的竞赛),按创建时间降序
     */
    public function findIndividualCompetitions(){

        $curTime = date('y-m-d H:i:s',time()+8*60*60);
        $competitions = Competition::where('end_at','>',$curTime)->where('type','=','individual')->get();
        return  $competitions;

    }

    /**
     * 返回系统中全部的活跃中的个人竞赛(尚未开始与尚未结束的竞赛),按创建时间降序
     */
    public function findTeamCompetitions(){

        $curTime = date('y-m-d H:i:s',time()+8*60*60);
        $competitions = Competition::where('end_at','>',$curTime)->where('type','=','team')->get();
        return  $competitions;

    }
}
