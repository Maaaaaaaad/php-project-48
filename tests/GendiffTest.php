<?php

namespace tests;

use PHPUnit\Framework\TestCase;
use function Differ\Gendiff\genDiff;

class GendiffTest extends TestCase
{
    public function testGenDiff()
    {
        $data1 = json_decode(file_get_contents(__DIR__ . '/../tests/fixtures/file3.json'), true);
        $data2 = json_decode(file_get_contents(__DIR__ . '/../tests/fixtures/file4.json'), true);

        $jsonExp = '{"- follow":false,"- host":"hexlet.io","- proxy":"165.554.5.22","- timeout":15000,"+ host":"google.io","+ timeout":20,"+ verbose":false}';

        $diff = genDiff($data1, $data2);

        $this->assertEquals( (string) $diff, (string) $jsonExp, message: "The comparison is incorrect");
    }
}
