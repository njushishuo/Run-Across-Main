<?php

namespace App\Http\Controllers;


use App\Record;
use Illuminate\Http\Request;
use Log;

class DeviceRecordController extends Controller
{
    protected $Record;
    public function __construct(Record $record)
    {
        $this->Record = $record;
    }


    public function getDeviceRecord($userId){


        Log::info('default');
        $record = $this->Record->getLatestRecord($userId);
        Log::info($record);
        return view('user_record',['record'=>$record]);


    }

    public function getDeviceRecordByDate($userId,$date){

        Log::info($date);
        $record = $this->Record->getRecord($userId,$date);
        Log::info($record);

        return view('user_record',['record'=>$record]);

   }

    public function getRecordAjax($userId,$date){

        Log::info($date);

        return ['result'=>true];
    }

}
