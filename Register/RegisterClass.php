<?php
namespace Register;
/**
 * 注册树模式
 * Created by PhpStorm.
 * User: linshuntao
 * Date: 2016/8/25
 * Time: 14:35
 */
class RegisterTree
{
    protected static $obj;

    //插入对象
    static function setObject($index, $object)
    {
        self::$obj[$index] = $object;
    }

    //取消对象
    static function unSetObject($index)
    {
        unset(self::$obj[$index]);
    }

    //取得对象
    static function getObject($index)
    {
        if (!isset(self::$obj[$index])) {
            return false;
        }
        return self::$obj[$index];
    }
}

