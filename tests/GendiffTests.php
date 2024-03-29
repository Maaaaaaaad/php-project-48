<?php




use PHPUnit\Framework\TestCase;
use function Differ\GenDiff\difference;



class GendiffTests extends TestCase
{


    public function testGendiff(): void
    {


        $json1 = file_get_contents(__DIR__ . "/fixtures/file1.json");
        $json2 = file_get_contents(__DIR__ . "/fixtures/file2.json");

       // $this->assertEquals('', difference());
    }
}