<?php
include_once 'parseOptions.php';
include_once 'commonFunction.php';

bubbleSort($array, $viewSpeed, $visible);

function getInsertIndex($array, $sortedRangeEndIndex)
{
    for ($i = 0; $i < count($array); $i++) {
        if ($array[$i] > $array[$sortedRangeEndIndex]) {
            return $i;
        }
    }
    die('not found index');
}

function bubbleSort($array, $viewSpeed, $visible)
{
    if ($visible) {
        view_sort($array, $viewSpeed);
    }
    do {
        $notDone = false;
        for ($i = 1; $i < count($array); $i++) {
            if ($array[$i - 1] > $array[$i]) {
                swap($array, $i - 1, $i);
                $notDone = true;
                if ($visible) {
                    view_sort($array, $viewSpeed);
                }
            }
        }
    } while ($notDone);

}

function swap(array &$array, int $left, int $right)
{
    if ($left !== $right) {
        $tmp = $array[$right];
        $array[$right] = $array[$left];
        $array[$left] = $tmp;
    }
}