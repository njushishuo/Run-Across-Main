<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Log;

class IndividualCmpt extends Model
{

    /**
     * 关联到模型的数据表
     *
     *
     */
    protected $table = 'individual_competition';
    public $timestamps = false;

    public function competition(){
        return $this->hasOne('App\Competition','id','competition_id');
    }

    public function user(){
        return $this->hasOne('App\User','id','user_id');
    }


    public function hasJoinedIdvCmp($cmpId , $userId){

        $competitions = IndividualCmpt::where('competition_id',$cmpId)
            ->where('user_id',$userId)
            ->get();
        $result = count($competitions)==0? false: true;
        return  $result;

    }

    /**
     * @param $id 竞赛Id
     * 返回当前每个成员的状态记录的数组, comptid,userid,stride;
     */
    public function getMemberRecords($id){

        $records = IndividualCmpt::where('competition_id',$id)->orderBy('stride_count','desc')->get();

        return $records;
    }

    public function joinCompetition($competitionId,$userId){
        if($competitionId==null || $userId== null){
            return "不存在这样的竞赛";
        }

        $exist = IndividualCmpt::where('competition_id',$competitionId)->where('user_id',$userId)->first();
        if($exist==null){
            $record = new IndividualCmpt();
            $record->competition_id = $competitionId;
            $record->user_id = $userId;
            $record->stride_count=0;
            $record->save();
            Log::info("try to save cmptid: $competitionId userId: $userId");
            return "加入成功";
        }else{
            return "你已经在这个竞赛中啦";
        }



    }

    public function quitCompetition($competitionId,$userId){
        $record = IndividualCmpt::where('competition_id',$competitionId)->where('user_id',$userId)->first();
        if($record!=null){

            Log::info("delete record: $record->competition_id , $record->user_id ,$record->stride_count");

            IndividualCmpt::where('competition_id',$competitionId)->where('user_id',$userId)->delete();

            return true;
        }

        return false;
    }

    public function getIdvCmptsJoinedBy($userId){
        $cmptIds = IndividualCmpt::select('competition_id')->where('user_id',$userId)->get();
        $cmpts = Competition::whereIn('id',$cmptIds)->get();
        if($cmpts==null){
            return array();
        }
        return $cmpts->all();

    }

    /**
     * 获取个人竞赛的比赛结果,返回每个成员的奖金，里程数，按里程数降序排序
     * @param $id 竞赛Id
     */
    public function getResult($id){

    }
}
