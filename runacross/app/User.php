<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Log;

class User extends Model
{
    /**
    * 关联到模型的数据表
    *
    *
    */
    protected $table = 'user';
    public $timestamps = false;

    public function getAllUsers(){
        $users = User::all();
        foreach ($users as $user){
            echo $user->user_name;
        }
    }

    public function verify($username , $password){

        Log::info("get username:".$username);

        $user = User::where('user_name', $username)->first();

        Log::info("user",['user'=>$user]);

        if($user==null){
            Log::info("user is null");
            return null;
        }


        if($user->password == $password){
            Log::info("验证通过");
            return $user;
        }

        return null;
    }


    public function getUserByIds($userIds){
        $users = User::whereIn('id',$userIds)->get();
        return $users;
    }


    public function searchUserByNickName($userId,$key){
        $users = User::where('nick_name','like','%'.$key.'%')
                        ->where('id','<>',$userId)->get();
        if($users!=null){
            if(count($users)==0){
                $users=null;
            }
        }
        return $users;

    }

}
