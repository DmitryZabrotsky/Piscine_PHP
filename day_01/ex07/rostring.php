#!/usr/bin/php
<?php
	if ($argc == 1)
		exit(1);
	$arr_to_slice = explode(" ", $argv[1]);
	$word = $arr_to_slice[0];
	$sliced_arr = array_slice($arr_to_slice, 1);
	array_push($sliced_arr, $word);
	$res_arr = array();
	foreach ($sliced_arr as $value) {
		array_push($res_arr, $value." ");
	}
	var_dump($res_arr);
	$i = count($res_arr);
	$res_arr[$i - 1] = trim($res_arr[$i - 1]);
	foreach ($res_arr as $value) {
		if ($value != " ") {
			echo $value;
		}
	}
	echo "\n";
?>