<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Log;

class Moment extends Model
{
    /**
     * 关联到模型的数据表
     *
     *
     */
    protected $table = 'moment';

    public $timestamps = false;

    public function Author(){
        return $this->belongsTo('App\User');
    }


    public function getMomentsByUserId( $userId ){
        $moments = Moment::where('author_id',$userId)->orderBy('created_at','desc')->get();
        return $moments;
    }


    public function getMomentsByUserIds($userIds){

        $moments = Moment::whereIn('author_id',$userIds)->OrderBy('created_at','desc')->get();

        Log::info("moments", ['momments'=>$moments ]);
        return $moments;

    }




}
