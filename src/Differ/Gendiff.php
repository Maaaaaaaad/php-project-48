<?php

namespace Differ\diff;

$autoloadPath1 = __DIR__ . '/../../autoload.php';
$autoloadPath2 = __DIR__ . '/../../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}


function genDiff($file1, $file2)
{

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




        return (array_merge($array, $array1));
}

function iter($file1, $file2)
{

    foreach ($file1 as $key => $item) {
        if (array_key_exists($key, $file2)) {
            $array ["  $key"] =  genDiff($item, $file2[$key]);
        } elseif (!array_key_exists($key, $file2)) {
            $array ["- $key"] = $item;
        }
    }

  foreach ($file2 as $key => $item) {

         if (!array_key_exists($key, $file1)) {
             $array1 ["+ $key"] = $item;
        } else {
             $array1 ["+ $key"] = genDiff($item, $file1[$key]);
         }
    }

   var_dump(array_merge($array, $array1));

}

