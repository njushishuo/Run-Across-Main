<?php

namespace App;
use Log;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    /**
     * 关联到模型的数据表
     *
     *
     */
    protected $table = 'sport_record';
    public $timestamps = false;

    public function getRecord($userId , $date){
        $record = Record::where('user_id',$userId)->where('date',$date)->first();
        Log::info("get record : $record");
        return $record;
    }

    public function getLatestRecord($userId){
        $record = Record::where('user_id',$userId)->first();
        return $record;
    }


}
