<?php

namespace Differ\GenDiff;


$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}


function difference($file1, $file2, $format)
{
    $array = [];
    $array1 = [];


    $data1 = json_decode(file_get_contents("$file1"), true);
    $data2 = json_decode(file_get_contents("$file2"), true);

    ksort($data1, SORT_STRING);
    ksort($data2, SORT_STRING);


    foreach ($data1 as $key => $item) {
        if (array_key_exists($key, $data2) && $item == $data2[$key]) {
            $array ["  $key"] = $data2[$key];
        } elseif (array_key_exists($key, $data2) && $item != $data2[$key]) {
            $array ["- $key"] = $item;
        } elseif (!array_key_exists($key, $data2)) {
            $array ["- $key"] = $item;
        }
    }

    foreach ($data2 as $key => $item) {
        if (array_key_exists($key, $data1) && $item != $data1[$key]) {
            $array1 ["+ $key"] = $item;
        } elseif (!array_key_exists($key, $data1)) {
            $array1 ["+ $key"] = $item;
        }
    }

    $merge = array_merge($array, $array1);

    return json_encode($merge);

}
