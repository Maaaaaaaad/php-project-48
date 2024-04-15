<?php

namespace tests\YamldiffTest;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Yaml\Yaml;
use function Differ\Yamldiff\yamlDiff;

class YamldiffTest extends TestCase
{
    public function Yamltest($file1, $file2, $format)
    {
        $data1 = Yaml::parse(file_get_contents(__DIR__ . '/../tests/fixtures/file5.yml'), Yaml::PARSE_OBJECT_FOR_MAP);
        var_dump($data1);
        $data2 = Yaml::parse(file_get_contents(__DIR__ . '/../tests/fixtures/file6.yaml'),Yaml::PARSE_OBJECT_FOR_MAP);

        $jsonExp = '{ - follow: false host: hexlet.io - proxy: 123.234.53.22 - timeout: 50 + timeout: 20 + verbose: true}';

        $diff = yamlDiff($data1, $data2);

        $this->assertEquals( (string) $diff, (string) $jsonExp, message: "The comparison is incorrect");
    }
}
