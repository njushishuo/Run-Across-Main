<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;

class DeviceRecordController extends Controller
{

   public function getDeviceRecordsByDate($userId,$date){

       return view('user_record');
   }

}
