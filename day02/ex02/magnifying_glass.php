#!/usr/bin/php
<?php

	if ($argc != 2)
		exit (1);
	$file = file_get_contents($argv[1]);
	preg_match_all("/(<a.*>)(.*)(<\/a>)/", $file, $a_tags);
	preg_match_all('/(<a).*(title="(.*)").*(<\/a>)/', $file, $titles);
	foreach ($a_tags[2] as $value)
		$file = str_replace($value, strtoupper($value), $file);
	foreach ($titles[3] as $value)
		$file = str_replace($value, strtoupper($value), $file);
	if (preg_match_all("/(<a[^<]*>)([^<]*<)/", $file, $a_tags)){
		foreach ($a_tags[2] as $value)
			$file = str_replace($value, strtoupper($value), $file);
	}
	echo $file;
?>