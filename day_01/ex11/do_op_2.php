#!/usr/bin/php
<?php

	if ($argc != 2) {
		echo "Incorrect Parametrs\n";
		exit(1);
	}
	if (preg_match("/^[ \t]*([-+]?\d+)[ \t]*([\+\-\*\%\/])[ \t]*([-+]?\d+)[ \t]*$/", $argv[1], $match) === 0) {
		echo "Syntax Error\n";
		exit(1);
	}

	$a = $match[1];
	$op = $match[2];
	$b = $match[3];

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