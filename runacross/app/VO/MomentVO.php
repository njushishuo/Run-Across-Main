<?php
/**
 * Created by PhpStorm.
 * User: ss14
 * Date: 2016/12/4
 * Time: 19:09
 */

namespace App\VO;


class MomentVO
{
    public $moment;
    public $hasVoted;
    public $count;
    public $created_at;
    public function __construct( $moment ,$hasVoted ,$count)
    {
        $this->moment = $moment;
        $this->hasVoted=$hasVoted;
        $this->count=$count;
        $this->created_at = date('Y-m-d',(int)$this->moment->created_at);

    }
}