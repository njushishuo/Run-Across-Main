<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Log;

class Competition extends Model
{
    /**
     * 关联到模型的数据表
     *
     *
     */
    protected $table = 'competition';
    public $timestamps = false;

    public function Author(){
        return $this->belongsTo('App\User');
    }

    /**
     * 返回系统中全部的活跃中的个人竞赛(尚未开始与尚未结束的竞赛),按创建时间降序
     */
    public function findIndividualCompetitions(){

        $curTime = time()+8*60*60;
        $competitions = Competition::where('end_at','>',$curTime)
                                    ->where('type','=','individual')
                                    ->orderBy('created_at','desc')
                                    ->get();
        return  $competitions;
    }



    /**
     * 返回系统中全部的活跃中的个人竞赛(尚未开始与尚未结束的竞赛),按创建时间降序
     */
    public function findTeamCompetitions(){

        $curTime = time()+8*60*60;
        $competitions = Competition::where('end_at','>',$curTime)
                                    ->where('type','=','team')
                                    ->orderBy('created_at','desc')
                                    ->get();
        return  $competitions;

    }


    public function getIdvCmptsCreatedBy($userId){

        $cmpts = Competition::where('type','individual')->where('author_id',$userId)->get();
        if($cmpts==null){
            return array();
        }
        return $cmpts->all();

    }

    public function getTmCmptsCreatedBy($userId){
        $cmpts = Competition::where('type','team')->where('author_id',$userId)->get();
        if($cmpts==null){
            return array();
        }
        return $cmpts->all();
    }
}
