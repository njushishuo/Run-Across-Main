<?php
/**
 * Created by PhpStorm.
 * User: ss14
 * Date: 2016/12/1
 * Time: 22:38
 */

namespace App\VO;


class Cmpt_RecordsVO
{
    //记录了竞赛本身的全部信息
    public $cmptVO;
    //记录了cmpt_id,user_id,stride,如果是多人竞赛的话，还有team，按照步数降序
    public $playerRecords;

    public function __construct($comptVO , $records)
    {
        $this->cmptVO = $comptVO;
        $this->playerRecords = $records;
    }
}