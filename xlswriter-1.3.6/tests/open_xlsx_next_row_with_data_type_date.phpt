--TEST--
Check for vtiful presence
--SKIPIF--
<?php
require __DIR__ . '/include/skipif.inc';
skip_disable_reader();
?>
--FILE--
<?php
$config = [
    'path' => './tests',
];

$fileObject = new \Vtiful\Kernel\Excel($config);
$fileObject = $fileObject->fileName('tutorial.xlsx');

$filePath = $fileObject->header(['date'])
    ->insertDate(1, 0, 1568389354, 'mmm d yyyy hh:mm AM/PM')
    ->output();

$fileObject->openFile('tutorial.xlsx')
    ->openSheet();

var_dump($fileObject->nextRow([\Vtiful\Kernel\Excel::TYPE_STRING])); // Header
var_dump($fileObject->nextRow([\Vtiful\Kernel\Excel::TYPE_TIMESTAMP]));
var_dump($fileObject->nextRow([\Vtiful\Kernel\Excel::TYPE_TIMESTAMP]));
var_dump($fileObject->nextRow([\Vtiful\Kernel\Excel::TYPE_TIMESTAMP]));
var_dump($fileObject->nextRow([\Vtiful\Kernel\Excel::TYPE_TIMESTAMP]));
var_dump($fileObject->nextRow([\Vtiful\Kernel\Excel::TYPE_TIMESTAMP]));
var_dump($fileObject->nextRow([\Vtiful\Kernel\Excel::TYPE_TIMESTAMP]));
?>
--CLEAN--
<?php
@unlink(__DIR__ . '/tutorial.xlsx');
?>
--EXPECT--
array(1) {
  [0]=>
  string(4) "date"
}
array(1) {
  [0]=>
  int(1568389354)
}
NULL
NULL
NULL
NULL
NULL