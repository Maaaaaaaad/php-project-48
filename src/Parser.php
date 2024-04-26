<?php

namespace Parser;

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}



use Symfony\Component\Yaml\Yaml;
use function Differ\diff\genDiff;
use function Differ\diff\iter;

function pars($file1, $file2, $format)
{
    if (pathinfo($file1, PATHINFO_EXTENSION) === 'json' && (pathinfo($file2, PATHINFO_EXTENSION) === 'json')) {
        $data1 = json_decode(file_get_contents("$file1"), true);
        $data2 = json_decode(file_get_contents("$file2"), true);

/*        ksort( $data1, SORT_STRING);
        ksort($data2, SORT_STRING);*/

        //echo json_encode(genDiff($varsObj1, $varsObj2));
        var_dump(iter($data1, $data2));

    } elseif (pathinfo($file1, PATHINFO_EXTENSION) === 'yml' || 'yaml' &&
        (pathinfo($file2, PATHINFO_EXTENSION) === 'yml' || 'yaml')) {
        $data1 = Yaml::parse(file_get_contents("$file1"), Yaml::PARSE_OBJECT_FOR_MAP);
        $data2 = Yaml::parse(file_get_contents("$file2"), Yaml::PARSE_OBJECT_FOR_MAP);

        $varsObj1 = get_object_vars($data1);
        $varsObj2 = get_object_vars($data2);

        ksort( $varsObj1, SORT_STRING);
        ksort($varsObj2, SORT_STRING);

        echo json_encode(genDiff($varsObj1, $varsObj2));
    }
}
