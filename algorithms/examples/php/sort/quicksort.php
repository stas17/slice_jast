<?php
include_once 'parseOptions.php';
include_once 'commonFunction.php';

quickSort($array, $viewSpeed, $visible);

function quickSort($array, $viewSpeed, $visible)
{
    qsort($array, 0, count($array) - 1, $viewSpeed,$visible);
}

function qsort(&$array, $left, $right, $viewSpeed,$visible)
{

    if ($left < $right)
    {
        $pivotIndex = random_int($left, $right);
        $newPivot = partition($array, $left, $right, $pivotIndex);

        qsort($array, $left, $newPivot -1, $viewSpeed,$visible);
        qsort($array, $newPivot+1, $right, $viewSpeed,$visible);
    }

    if ($visible) {
        view_sort($array, $viewSpeed);
    }
    return $array;
}

function partition(&$array, $left, $right, $pivotIndex)
{
    $pivotValue = $array[$pivotIndex];

    swap($array, $pivotIndex, $right);

    $storeIndex = $left;

    for ($i = $left; $i < $right; $i++) {
        if ($array[$i] > $pivotValue) {
            swap($array, $i, $storeIndex);
            $storeIndex++;
        }
    }
    swap($array, $storeIndex, $right);

    return $storeIndex;
}