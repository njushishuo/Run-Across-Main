<?php

namespace App;

use Log;
use Illuminate\Database\Eloquent\Model;

class Summary extends Model
{
    /**
     * 关联到模型的数据表
     *
     *
     */
    protected $table = 'record_summary';
    public $timestamps = false;

    public function getSummary($userId){

        $summary = Summary::find($userId);
        return $summary;
    }
}
