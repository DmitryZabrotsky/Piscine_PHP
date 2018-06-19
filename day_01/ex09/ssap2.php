#!/usr/bin/php
<?php
	
if ($argc == 1)
	exit(1);
unset($argv[0]);
$str = implode(" ", $argv);
$arr = explode(" ", $str);
asort($arr);
foreach ($arr as $val) {
	echo $val."\n";
}
?>