#!/usr/bin/php
<?php

	if ($argc != 2)
		exit(1);
	$str = trim($argv[1]);
	$arr = explode(" ", $str);
	$ret = array_filter($arr);
	echo implode(" ", $ret)."\n";
?>