#!/usr/bin/php
<?php

	if ($argc != 2)
		exit (1);
	$page = file_get_contents($argv[1]);
	if ($page) {
		preg_match_all("/<img.*src=\"([^\"]*)\"/i", $page, $img_t);
		$dir = strchr($argv[1] , '/').PHP_EOL;
		$dir = trim($dir, "/\n");
		if (file_exists($dir) === FALSE)
			mkdir($dir, 0755, TRUE);
		foreach ($img_t[1] as $value) {
			$name = strrchr($value , '/');
			if (strpos($value, $argv[1]) === FALSE) {
				$img = file_get_contents($argv[1].$value);
			}
			else {
				$img = file_get_contents($value);
			}
			file_put_contents($dir."/".$name, $img);
		}
	}
?>