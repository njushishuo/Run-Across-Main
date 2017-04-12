<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Log;

class TeamCmpt extends Model
{

    /**
     * 关联到模型的数据表
     *
     *
     */
    protected $table = 'team_competition';
    public $timestamps = false;

    public function competition(){
        return $this->hasOne('App\Competition','id','competition_id');
    }

    public function user(){
        return $this->hasOne('App\User','id','user_id');
    }

    public function hasJoinedIdvCmp($cmpId , $userId){
        $competitions = TeamCmpt::where('competition_id',$cmpId)
            ->where('user_id',$userId)
            ->get();
        $result = count($competitions)==0? false: true;
        return  $result;
    }

    /**
     * @param $id 竞赛Id
     * 返回当前每个成员的状态记录的数组, comptid,userid,team,stride;
     */
    public function getMemberRecords($id){

        $records = TeamCmpt::where('competition_id',$id)->orderBy('stride_count','desc')->get();

//        Log::info("teamRecord!!");
//
//        Log::alert($records);

        return $records;
    }

    public function joinCompetition($competitionId,$userId ,$team){


        if($competitionId==null || $userId == null){
            $info="不存在这样的竞赛";
            return $info;
        }
        $exist = TeamCmpt::where('competition_id',$competitionId)->where('user_id',$userId)->first();
        if($exist==null){
            $record = new TeamCmpt();
            $record->competition_id = $competitionId;
            $record->user_id = $userId;
            $record->team = $team;
            $record->stride_count=0;
            $record->save();
            Log::info("try to save cmptid: $competitionId userId: $userId");
            $info= "加入成功";
            return $info;

        }else{

            $info= "你已经在这个竞赛中啦";
            return $info;
        }

    }

    public function quitCompetition($competitionId,$userId){

        $record = TeamCmpt::where('competition_id',$competitionId)->where('user_id',$userId)->first();
        if($record!=null){

            TeamCmpt::where('competition_id',$competitionId)->where('user_id',$userId)->delete();
            return true;
        }
        return false;
    }

    public function getTmCmptsJoinedBy($userId){
        $cmptIds = TeamCmpt::select('competition_id')->where('user_id',$userId)->get();
        $cmpts = Competition::whereIn('id',$cmptIds)->get();
        if($cmpts==null){
            return array();
        }
        return $cmpts->all();
    }

    /**
     * 获取团队竞赛的比赛结果,返回获胜队伍每个成员的奖金，里程数，按里程数降序排序
     * @param $id 竞赛Id
     */
    public function getResult($id){

    }

}
