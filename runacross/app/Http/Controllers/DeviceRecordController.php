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

    public function saveDeviceRecord(Request $request){

        $inputs = $request->all();
        Log::info($inputs);

        $record = new Record();
        $record->user_id = $inputs['user_id'];
        $record->date = $inputs['date'];
        $record->distance = $inputs['distance'];
        $record->start_at = $inputs['start_at'];
        $record->duration = $inputs['duration'];
        $record->avg_pace = $inputs['avg_pace'];
        $record->calorie = $inputs['calorie'];
        $record->avg_speed = $inputs['avg_speed'];
        $record->stride_frequency = $inputs['stride_frequency'];
        $record->avg_stride = $inputs['avg_stride'];
        $record->total_stride = $inputs['total_stride'];
        $record->heart_rate = $inputs['heart_rate'];

        $record->save();


    }

}
