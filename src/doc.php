<?php



require __DIR__ . '/../vendor/docopt/docopt/src/docopt.php';


$doc = <<<'DOCOPT'
Generate diff

Usage: gendiff (-v|--version)
       gendiff (-h|--help)    

Options:
  -h --help          Show this screen
  -v --version       Show version


DOCOPT;

$result = Docopt::handle($doc, array('version' => '1.0.0rc2'));
foreach ($result as $k => $v)
    echo $k . ': ' . json_encode($v) . PHP_EOL;


