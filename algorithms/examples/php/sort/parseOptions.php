<?php

const DATA_DIR = '/../../../data/';
$size = 100;
$templates = [
    'xs' => '30',
    's' => '100',
    'm' => '1000',
    'l' => '10000'
];
$options = getopt("vs:t:g:");
$visible = array_key_exists('v', $options);
$viewSpeed = ($options['s'] ?? 1) * 1000;
if (array_key_exists('t', $options)) {
    if (array_key_exists($options['t'], $templates)) {
        $size = $templates[$options['t']];
    }
}

if (array_key_exists('g', $options)) {
    $size = $options['g'];
    $array = generateNew($size);
} else {
    $array = explode("\n", file_get_contents(__DIR__ . DATA_DIR . sprintf('random_int_%s.txt', $size)));
}

function generateNew($size)
{
    $array = [];
    for ($i = 1; $i < $size; $i++) {
        $array[] = random_int(1, 60);
    }
    return $array;
}