--TEST--
Check for vtiful presence
--SKIPIF--
<?php
require __DIR__ . '/include/skipif.inc';
skip_disable_reader();
?>
--FILE--
<?php
$config   = ['path' => './tests'];
$excel    = new \Vtiful\Kernel\Excel($config);
$filePath = $excel->fileName('tutorial.xlsx', 'TestSheet1')
    ->header(['Item', 'Cost'])
    ->output();

$sheetList = $excel->openFile('tutorial.xlsx')->sheetList();

var_dump(is_array($sheetList));
var_dump($sheetList);
?>
--CLEAN--
<?php
@unlink(__DIR__ . '/tutorial.xlsx');
?>
--EXPECT--
bool(true)
array(1) {
  [0]=>
  string(10) "TestSheet1"
}