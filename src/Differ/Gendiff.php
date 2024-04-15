<?php

namespace Differ\Gendiff;

$autoloadPath1 = __DIR__ . '/../../autoload.php';
$autoloadPath2 = __DIR__ . '/../../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}


function jsonDiff($file1, $file2)
{
    $array = [];
    $array1 = [];


    ksort($file1, SORT_STRING);
    ksort($file2, SORT_STRING);


    foreach ($file1 as $key => $item) {
        if (array_key_exists($key, $file2) && $item == $file2[$key]) {
            $array ["  $key"] = $file2[$key];
        } elseif (array_key_exists($key, $file2) && $item != $file2[$key]) {
            $array ["- $key"] = $item;
        } elseif (!array_key_exists($key, $file2)) {
            $array ["- $key"] = $item;
        }
    }

    foreach ($file2 as $key => $item) {
        if (array_key_exists($key, $file1) && $item != $file1[$key]) {
            $array1 ["+ $key"] = $item;
        } elseif (!array_key_exists($key, $file1)) {
            $array1 ["+ $key"] = $item;
        }
    }

    $merge = array_merge($array, $array1);
    return json_encode($merge);
}
