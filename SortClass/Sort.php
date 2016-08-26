<?php
namespace SortClass;
/**
 * Created by PhpStorm.
 * User: linshuntao
 * Date: 2016/8/24
 * Time: 9:54
 */
class Sort
{
    //冒泡排序
    public function bubbleSort($arr)
    {
        //获取数组的元素个数
        $n = count($arr);
        for ($i = 0; $i < $n; $i++) {
            //设置一个判断数组是否已经排完序，如果已排完，提前结束循环。
            $a = false;
            for ($j = $n - 1; $j > $i; $j--) {
                /**
                 * 采用升序排序
                 * 从高位往低位比较，低位比高位先排好序。
                 */
                if ($arr[$j] < $arr[$j - 1]) {
                    $temp = $arr[$j];
                    $arr[$j] = $arr[$j - 1];
                    $arr[$j - 1] = $temp;
                    $a = true;
                }
            }
            //若已排完序，跳出循环。
            if (!$a) {
                $i = $n;
            }
        }
        return $arr;
    }

    //插入排序
    public function insertionSort($arr)
    {
        $n = count($arr);
        for ($i = 1; $i < $n; $i++) {
            //升序排序
            if ($arr[$i - 1] > $arr[$i]) {
                //提取要交换位置的数值
                $temp = $arr[$i];
                $j = $i;
                //交换数据，撤出目标位置，让给该轮循环的最小值
                while ($j > 0 && $arr[$j - 1] > $temp) {
                    $arr[$j] = $arr[$j - 1];
                    $j--;
                }
                //将该轮循环的最小值赋值目标位置
                $arr[$j] = $temp;
            }
        }
        return $arr;
    }

    //选择排序
    public function selectSort($arr)
    {
        $n = count($arr);
        for ($i = 0; $i < $n; $i++) {
            //开始假设该轮循环的第一位为最小值
            $minIndex = $i;
            for ($j = $i + 1; $j < $n; $j++) {
                //按照升序排序 将最小的一个数挑出来
                if ($arr[$j] < $arr[$minIndex]) {
                    $minIndex = $j;
                }
            }
            //将每次循环所挑出的最小数与低位元素交换，低位较高位先排好序。
            if ($minIndex != $i) {
                $temp = $arr[$i];
                $arr[$i] = $arr[$minIndex];
                $arr[$minIndex] = $temp;
            }
        }
        return $arr;
    }

    //快速排序
    public function quickSort(&$arr, $low, $top)
    {
        //递归出口
        if ($low < $top) {
            //获得的基点的位置
            $pos = $this->partition($arr, $low, $top);
            //递归数组
            $this->quickSort($arr, $low, $pos - 1);
            $this->quickSort($arr, $pos + 1, $top);
        }
        return $arr;
    }

    private function partition(&$arr, $low, $top)
    {
        //将首位数字作为比较的基点
        $key = $low;
        while ($low < $top) {
            //大小同时交换,提高了效率
            while ($arr[$key] <= $arr[$top] && $low < $top) {
                $top--;
            }
            while ($arr[$key] >= $arr[$low] && $low < $top) {
                $low++;
            }
            if ($low != $top) {
                $temp = $arr[$low];
                $arr[$low] = $arr[$top];
                $arr[$top] = $temp;
            }
        }
        //将基点与最后交换所得的数字交换，原数组便被基点切割成大小2个数组
        $temp = $arr[$low];
        $arr[$low] = $arr[$key];
        $arr[$key] = $temp;

        //返回基点的交换后的位置，将2个数组再次循环
        return $low;
    }

    //归并排序
    public function mergeSort($arr)
    {
        if (count($arr) <= 1) {
            return $arr;
        }
        //将数组分成左右2个数组  array_slice函数为截取目标数组中的一段序列
        $left = array_slice($arr, 0, (int)(count($arr) / 2));
        $right = array_slice($arr, (int)(count($arr) / 2));
        //无限细分，直到满足条件数组个数为1
        $left = $this->mergeSort($left);
        $right = $this->mergeSort($right);
        //合并数组
        $result = $this->merge($left, $right);
        return $result;

    }

    private function merge($left, $right)
    {
        //定义一个存放数据的数组，后续的数组插入操作用array_push函数
        $arr2 = array();
        while (count($left) > 0 && count($right) > 0) {
            //按照大小顺序合并数组，array_shift函数为删除数组的第一个元素并返回该元素值，如果不删除的话，将会导致内存溢出。
            if ($left[0] <= $right[0]) {
                array_push($arr2, array_shift($left));
            } else {
                array_push($arr2, array_shift($right));
            }
        }
        //array_splice函数的作用为用新数组的内容替代原数组的内容
        array_splice($arr2, count($arr2), 0, $left);
        array_splice($arr2, count($arr2), 0, $right);
        return $arr2;
    }


}

