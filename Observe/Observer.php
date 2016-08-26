<?php
namespace Observer;
/**
 * 观察者模式
 * User: linshuntao
 * Date: 2016/8/26
 * Time: 10:58
 */
class Observer
{
    private $observers = array();

    //注册观察者
    public function register($sub)
    {
        $this->observers[] = $sub;
    }

    public function trigger()
    {
        if (!empty($this->observers)) {
            foreach ($this->observers as $v) {
                $v->update();
            }
        }
    }
}

interface Observerable
{
    public function update();
}

class User implements Observerable
{
    public function update()
    {
        echo '大家好，收租了！' . '<br>';
    }
}

