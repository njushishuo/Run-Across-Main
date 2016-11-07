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
}
