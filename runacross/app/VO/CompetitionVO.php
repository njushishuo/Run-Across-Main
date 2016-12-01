<?php

namespace App\VO;

class CompetitionVO
{
    public $competition;
    public $hasBegun;
    public $hour;
    public $min;
    public $sec;
    public $createDate;

    public function __construct($competition)
    {
        $this->competition = $competition;
        $this->createDate = date('Y-m-d',$this->competition->created_at);
        $curTime = time()+8*60*60;
        //等待中
        if($this->competition->start_at > $curTime){

            $this->hasBegun=false;
            $interval = $this->competition->start_at - $curTime;
            $this->hour =  (Integer)($interval/3600);
            $this->min  = (Integer)(($interval - $this->hour*3600)/60);
            $this->sec  = $interval - $this->hour*3600-$this->min*60;

        }else{

            $this->hasBegun=true;
            $interval = $this->competition->end_at - $curTime;
            $this->hour =  (Integer)($interval/3600);
            $this->min  = (Integer)(($interval - $this->hour*3600)/60);
            $this->sec  = $interval - $this->hour*3600-$this->min*60;
        }

    }

}