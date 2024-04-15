<?php

namespace Differ\yamldiff;

use function Differ\Gendiff\genDiff;

$autoloadPath1 = __DIR__ . '/../../autoload.php';
$autoloadPath2 = __DIR__ . '/../../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

function yamlDiff($file1, $file2)
{
    $data1 = get_object_vars($file1);
    $data2 = get_object_vars($file2);

    return genDiff($data1, $data2);

}

