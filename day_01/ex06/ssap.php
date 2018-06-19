#!/usr/bin/php
<?php
	
if ($argc == 1)
	exit(1);
unset($argv[0]);
$str = implode(" ", $argv);
$arr = explode(" ", $str);
sort($arr);
foreach ($arr as $val) {
	echo $val."\n";
}
?>