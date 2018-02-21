<?php
include_once 'parseOptions.php';
include_once 'commonFunction.php';

choiceSort($array, $viewSpeed, $visible);

function choiceSort($array, $viewSpeed, $visible)
{
    $sortedRangeEnd = 0;
    if ($visible) {
        view_sort($array, $viewSpeed);
    }
    while ($sortedRangeEnd < count($array)) {
        $nextIndex = findIndexOfSmallestFromIndex($array, $sortedRangeEnd);
        swap($array, $sortedRangeEnd, $nextIndex);
        if ($visible) {
            view_sort($array, $viewSpeed);
        }
        $sortedRangeEnd++;
    }
}

function findIndexOfSmallestFromIndex($array, $sortedRangeEnd)
{
    $current = $array[$sortedRangeEnd];
    $currentSmallestIndex = $sortedRangeEnd;

    for ($i = $sortedRangeEnd + 1; $i < count($array); $i++) {
        if ($current < $array[$i]) {
            $current = $array[$i];
            $currentSmallestIndex = $i;
        }
    }

    return $currentSmallestIndex;
}