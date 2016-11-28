<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
    * 关联到模型的数据表
    *
    *
    */
    protected $table = 'user';

    public function getAllUsers(){
        $users = User::all();
        foreach ($users as $user){
            echo $user->user_name;
        }
    }

    public function verify($username , $password){
        $user = User::where('user_name', $username)->get();
        if($user.$password == $password){
            return true;
        }
        return false;
    }
}
