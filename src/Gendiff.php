<?php

namespace Differ\src\genDiff;

use Functional\Functional;

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

use function Functional\map;
use function Functional\select;
use function Functional\reject;
use function Functional\sort;
use function Functional\select_keys;

function difference( $file1,$file2, $format)
{

    $data1 = json_decode(file_get_contents("$file1"), true);
    $data2 = json_decode(file_get_contents("$file2"), true);

    $merge = array_merge($data1,$data2);


    

}

   /* $usersByAge = array_reduce($year, function ($acc, $year) {
        if (!array_key_exists($year, $acc)) {
            $acc[$year] = 0;
        }
        $acc[$year]++;
        return $acc;

    }, []);*/

   // $selected = sort($result, fn ($left, $right) => strcmp($left, $right));