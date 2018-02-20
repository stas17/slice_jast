<?php
include_once 'parseOptions.php';
include_once 'commonFunction.php';

insertSort($array, $viewSpeed, $visible);

function insertSort($array, $viewSpeed, $visible)
{
    $sortedRangeEndIndex = 1;
    while ($sortedRangeEndIndex < count($array)) {
        if ($array[$sortedRangeEndIndex] < $array[$sortedRangeEndIndex - 1]) {
            $insertIndex = getInsertIndex($array, $sortedRangeEndIndex);

            $tmp = $array[$insertIndex];
            $array[$insertIndex] = $array[$sortedRangeEndIndex];

            for ($current = $sortedRangeEndIndex; $current > $insertIndex; $current--) {
                $array[$current] = $array[$current - 1];
            }

            $array[$insertIndex + 1] = $tmp;
            if ($visible) {
                view_sort($array, $viewSpeed);
            }
        }
        $sortedRangeEndIndex++;
    }
}

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