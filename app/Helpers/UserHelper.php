<?php
/**
 * Created by PhpStorm.
 * User: totorro
 * Date: 07.04.16
 * Time: 23:51
 */
namespace App\Helpers;

use Sentinel;

class UserHlp
{

    public static function getCurUser()
    {
        return Sentinel::check();
    }

    public static function getCurUserId()
    {
        if ($user = self::getCurUser()) return $user->id;
        return null;
    }
}