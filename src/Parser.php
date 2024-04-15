<?php

namespace Parser;

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

use function Differ\Gendiff\genDiff;
use function Differ\Yamldiff\yamlDiff;

use Symfony\Component\Yaml\Yaml;

function pars($file1, $file2, $format)
{
    if (pathinfo($file1, PATHINFO_EXTENSION) === 'json' && (pathinfo($file2, PATHINFO_EXTENSION) === 'json')) {
        $data1 = json_decode(file_get_contents("$file1"), true);
        $data2 = json_decode(file_get_contents("$file2"), true);

        echo genDiff($data1, $data2);
    } elseif (pathinfo($file1, PATHINFO_EXTENSION) === 'yml' || 'yaml' &&
                (pathinfo($file2, PATHINFO_EXTENSION) === 'yml' || 'yaml')) {
        $data1 = Yaml::parse(file_get_contents("$file1"), Yaml::PARSE_OBJECT_FOR_MAP);
        $data2 = Yaml::parse(file_get_contents("$file2"), Yaml::PARSE_OBJECT_FOR_MAP);

        echo yamlDiff($data1, $data2);
    }
}
