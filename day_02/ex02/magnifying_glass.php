#!/usr/bin/php
<?php

	if ($argc != 2)
		exit (1);	

	$file = file_get_contents($argv[1]);
	var_dump($file);
	preg_match_all("/(<a.*title=)(\".*\")(.*>.*<\/a>)/", $file, $a_tags);
	var_dump($a_tags);
?>