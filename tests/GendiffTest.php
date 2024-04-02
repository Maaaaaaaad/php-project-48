<?php

namespace tests\GendiffTests;

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}


use PHPUnit\Framework\TestCase;
use function Differ\Gendiff\difference;



class GendiffTest extends TestCase
{
    public function testGendiff()
    {


        $data1 = '/mnt/c/php-project-48/tests/fixtures/file1.json';
        $data2 = '/mnt/c/php-project-48/tests/fixtures/file2.json';



       $jsonExp = '{"- follow":false,"  host":"hexlet.io","- proxy":"123.234.53.22","- timeout":50,"+ timeout":20,"+ verbose":true}';



        $diff = difference( $data1, $data2, "json");



        $this->assertEquals( (string) $diff, (string) $jsonExp, message: "The comparison is incorrect");





    }

}
