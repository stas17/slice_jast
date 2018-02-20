<?php
//https://tproger.ru/translations/sorting-for-beginners/
function view_sort($array, $viewSpeed)
{
    $sort = [];
    $max = max($array) + 1;
    foreach ($array as $item) {
        $str = [];
        for ($i = 1; $i < $max; $i++) {
            if ($i <= $item) {
                $str[] = '#';
            } else {
                $str[] = ' ';
            }
        }
        $sort[] = array_reverse($str);
    }
    $str_sort = '';

    for ($i = 1; $i < $max; $i++) {
        for ($j = 1; $j < count($sort); $j++) {
            $str_sort .= $sort[$j - 1][$i - 1];
        }
        $str_sort .= PHP_EOL;
    }
    print_r($str_sort);
    usleep($viewSpeed);

}