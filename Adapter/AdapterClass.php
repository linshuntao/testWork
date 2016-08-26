<?php
namespace Adapter;
/*
 * 目标角色
 */

interface Plug
{
    public function chargeByPlug();
}

/*
 * 源角色
 */

class Usb
{
    public function chargeByUsb()
    {
        echo '我是通过USB来充电的！' . '<br>';
    }
}

/*
 * 适配器角色
 * 类适配器模式，使用的是类继承
 */

class Adapter extends Usb implements Plug
{
    //实现chargeByPlug方法
    public function chargeByPlug()
    {
        echo '我是通过插头来充电的!' . '<br>';
    }
}

/*
 * 适配器角色
 * 对象适配器模式，使用的是委派
 */

class AdapterObject implements Plug
{
    private $_usb;

    public function __construct(Usb $usb)
    {
        $this->_usb = $usb;
    }

    /*
     * 委派调用Usb类中的chargeByUsb方法
     */
    public function chargeByUsb()
    {
        $this->_usb->chargeByUsb();
    }

    //实现chargeByPlug方法
    public function chargeByPlug()
    {
        echo '我是通过插头来充电的!' . '<br>';
    }
}


