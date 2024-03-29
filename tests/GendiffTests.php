<?php


namespace Differ\tests\GendiffTests;

use PHPUnit\Framework\TestCase;
use function Differ\GenDiff\difference;



class UtilsTest extends TestCase
{


    public function testReverse(): void
    {


        $json1 = file_get_contents(__DIR__ . "/fixtures/file1.json");
        $json2 = file_get_contents(__DIR__ . "/fixtures/file2.json");

       // $this->assertEquals('', difference());
    }
}