<?php
include_once 'parseOptions.php';
include_once 'commonFunction.php';

mergeSort($array, $viewSpeed, $visible);

function mergeSort($array, $viewSpeed, $visible)
{
    sort_m($array, $viewSpeed, $visible);
}

function sort_m(&$array, $viewSpeed,$visible)
{
    if (count($array) <= 1) {
        return;
    }


    $left = [];
    $right = [];
    foreach ($array as $k => $v) {
        if ($k % 2 != 0) {
            $left[] = $v;
        } else {
            $right[] = $v;
        }
    }

    sort_m($left, $viewSpeed, $visible);
    sort_m($right, $viewSpeed, $visible);

    $array = merge($array, $left, $right);
    if($visible) view_sort($array, $viewSpeed);
}

function merge($array, $left, $right)
{
    $leftIndex = 0;
    $rightIndex = 0;
    $targetIndex = 0;

    $remaining = count($left) + count($right);

    while ($remaining > 0) {
        if ($leftIndex >= count($left)) {
            $array[$targetIndex] = $right[$rightIndex++];
        } elseif ($rightIndex >= count($right)) {
            $array[$targetIndex] = $left[$leftIndex++];
        } elseif ($left[$leftIndex] < $right[$rightIndex]) {
            $array[$targetIndex] = $left[$leftIndex++];
        } else {
            $array[$targetIndex] = $right[$rightIndex++];
        }

        $targetIndex++;
        $remaining--;
    }

    return $array;
}