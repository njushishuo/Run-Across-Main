<?php
/**
 * Created by PhpStorm.
 * User: ss14
 * Date: 2016/12/4
 * Time: 19:09
 */

namespace App\VO;


class UserVO
{
    public $user;
    public $hasFollowed;
    public function __construct( $user ,$hasFollowed)
    {
        $this->user = $user;
        $this->hasFollowed = $hasFollowed;

    }
}