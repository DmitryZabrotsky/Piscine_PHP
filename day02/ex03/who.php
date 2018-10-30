#!/usr/bin/php
<?php

	$file = fopen("/var/run/utmpx", 'r');
	date_default_timezone_set("Europe/Kiev");
	while ($str = fread($file, 628)) {
		$arr = unpack("a256user/a4id/a32line/ipid/itype/Itime", $str);
		var_dump($arr);
		if ($arr[type] == 7) {
			echo "$arr[user]  $arr[line]  ".date("M  j H:i", $arr[time])."\n";
		}
	}
?>