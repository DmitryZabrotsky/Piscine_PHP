#!/usr/bin/php
<?php
	if ($argc <= 2)
		exit (1);
	$key = $argv[1];
	foreach ($argv as $value) {
		if (strstr($value, $key)) {
			$i = strpos($value, $key);
			$len = strlen($value);
			$exploaded_arg = explode(":", $value);
			if ($i == 0)
				$res = ($exploaded_arg[1]);
			else
				$res = ($exploaded_arg[2]);
		}
	}
	echo $res."\n";
?>