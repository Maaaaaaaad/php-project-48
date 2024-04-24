<?php

namespace tests;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Yaml\Yaml;
use function Differ\diff\genDiff;

class YamldiffTest extends TestCase
{
    public function testYamldiff()
    {
        $data1 = Yaml::parse(file_get_contents(__DIR__ . '/../tests/fixtures/file5.yml'), Yaml::PARSE_OBJECT_FOR_MAP);
        $data2 = Yaml::parse(file_get_contents(__DIR__ . '/../tests/fixtures/file6.yaml'),Yaml::PARSE_OBJECT_FOR_MAP);

        $varsObj1 = get_object_vars($data1);
        $varsObj2 = get_object_vars($data2);

        ksort( $varsObj1, SORT_STRING);
        ksort($varsObj2, SORT_STRING);


        $yamlExp = '{"- follow":false,"  host":"hexlet.io","- proxy":"123.234.53.22","- timeout":50,"+ timeout":20,"+ verbose":true}';



        $diff = json_encode(genDiff($varsObj1, $varsObj2));

        $this->assertEquals((string) $diff, (string)$yamlExp, message: "The comparison is incorrect");
    }
}
