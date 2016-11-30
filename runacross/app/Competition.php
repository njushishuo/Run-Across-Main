<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    /**
     * 关联到模型的数据表
     *
     *
     */
    protected $table = 'competition';
    public $timestamps = false;

    /**
     * 返回系统中全部的活跃中的竞赛(尚未开始与尚未结束的竞赛)
     */
    public function findAll(){

        $competitions = Competition::findAll();
        return $competitions;

    }
}
