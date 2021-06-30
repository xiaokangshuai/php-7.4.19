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
    ->data([
        ['Item_1', 'Cost_1', 10, 10.9999995],
        ['Item_2', 'Cost_2', 10, 10.9999995],
        ['Item_3', 'Cost_3', 10, 10.9999995],
    ])
    ->output();

$excel->openFile('tutorial.xlsx')
    ->openSheet()
    ->setSkipRows(3);

while (is_array($data = $excel->nextRow())) {
    var_dump($data);
}
?>
--CLEAN--
<?php
@unlink(__DIR__ . '/tutorial.xlsx');
?>
--EXPECT--
array(4) {
  [0]=>
  string(6) "Item_3"
  [1]=>
  string(6) "Cost_3"
  [2]=>
  int(10)
  [3]=>
  float(10.9999995)
}