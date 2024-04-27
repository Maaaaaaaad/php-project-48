<?php

namespace Differ\diff;

use function Functional\contains;

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
/*    foreach ($file1 as $key => $item) {

        if (!array_key_exists($key, $file2)) {
            $array ["-  $key"] = $item;
        } elseif (is_array($item) && array_key_exists($key, $file2)) {
            foreach ($item as $subKey => $subItem) {
                if (is_array($subItem && is_array($file2[$key][$subKey])) ) {
                    $array["  $key"] = $array[$subKey] = $item;
                } elseif (!is_array($subItem)) {
                    if ($subItem == $file2[$key][$subKey]) {
                        $array["  $key"] = $array[" $subKey"] = $subItem;
                    } elseif ($subItem != $file2[$key][$subKey]) {
                        $array["  $key"] = $array["-  $subKey"] = $subItem;
                    }
                }

            }

        }
    }

    var_dump($array);*/




}







/*    if (is_array($file1)) {
        foreach ($file1 as $key => $item) {
                if (array_key_exists($key, $file2)) {
                    $array ["  $key"] = is_array($item) ? iter($item,$file2[$key]): $item;

                } elseif (!array_key_exists($key, $file2)) {
                    $array ["- $key"] = is_array($item) ? iter($item,$file2[$key]): $item;
                }
            }

    } else {
        //$array = genDiff($file1, $file2);
    }



  foreach ($file2 as $key => $item) {

         if (!array_key_exists($key, $file1)) {
             $array1 ["+ $key"] = $item;
        } else {
             $array1 ["+ $key"] = genDiff($item, $file1[$key]);
         }
    }


    var_dump($array);
    return $array;

}*/

