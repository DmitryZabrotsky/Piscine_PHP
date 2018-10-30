#!/usr/bin/php
<?php

	if ($argc != 4) {
		echo "Incorrect Parametrs\n";
		exit(1);
	}

	$a = trim($argv[1]);
	$op = trim($argv[2]);
	$b = trim($argv[3]);

	if ($op == "+") {
		echo $a + $b;
	}
	elseif ($op == "-") {
		echo $a - $b;
	}
	elseif ($op == "*") {
		echo $a * $b;
	}
	elseif ($op == "/") {
		echo $a / $b;
	}
	elseif ($op == "%") {
		echo $a % $b;
	}
	echo "\n";
?>