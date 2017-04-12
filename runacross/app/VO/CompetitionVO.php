<?php

namespace App\VO;
use Log;

class CompetitionVO
{
    public $competition;
    public $hasBegun;
    public $hasEnded;
    public $created_at;
    public $start_at;
    public $end_at;
    public $hasJoined;

    public function __construct($competition , $hasJoined = true)
    {
        $this->competition = $competition;
        $this->created_at = date('Y-m-d',(int)$this->competition->created_at);
        $this->start_at = date('Y-m-d',(int)$this->competition->start_at);
        $this->end_at = date('Y-m-d',(int)$this->competition->end_at);
        $this->hasJoined = $hasJoined;

        $curTime = time()+8*60*60;

        //等待中
        if($this->competition->start_at > $curTime){
            $this->hasBegun=false;
        }else{
            //进行中
            $this->hasBegun=true;
            $this->hasEnded=false;
            //已经结束
            if($this->competition->end_at< $curTime){
                $this->hasEnded=true;
            }
        }

    }

}