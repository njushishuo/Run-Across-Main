<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //指定数据库中的表
    protected $table = 'user';
    //不要created_at 和 updated_at
    public $timestamps = false;

    function getAllUser(){
        $users = User::all();
        foreach($users as $user){
            echo ($user->user_name);
        }
    }

}
