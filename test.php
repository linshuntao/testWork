<?php

use SortClass\sort;
use Register\RegisterTree;
use Observer\Observer;
use Observer\User;
use Adapter\Usb;
use Adapter\AdapterObject;

require './Adapter/AdapterClass.php';
require './Observe/Observer.php';
require './Register/RegisterClass.php';
require './SortClass/Sort.php';

$array = array(12, 14, 85, 46, 32, 845, 3, 647, 169, 68, 741, 24, 489, 5, 1, 102, 203);
$sortTest = new Sort();
$registerTest = new RegisterTree();
$registerTest->setObject(0, $sortTest);
$a = $registerTest->getObject(0);
var_dump($a->bubbleSort($array));
$registerTest->unSetObject(0);
echo '<br>';
$b = new Usb();
$a = new AdapterObject($b);
$a->chargeByUsb();
$a->chargeByPlug();

$a = new Observer();
$a1 = new User();
$a2 = new User();
$a3 = new User();
$a->register($a1);
$a->register($a2);
$a->register($a3);
$a->trigger();