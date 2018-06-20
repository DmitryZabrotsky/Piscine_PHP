#!/usr/bin/php
<?php
	
	if ($argc != 2)
		exit (1);
	if (preg_match("/^([A-Za-z][a-z]+) (\d\d?) ([A-Za-z][a-z]+) (\d\d\d\d) (\d\d):(\d\d):(\d\d)$/", $argv[1], $time) === 0) {
		echo "Wrong Format\n";
		exit (1);
	}

	$day = strtolower($time[1]);
	if ($day == "lundi" || $day == "mardi" || $day == "mercredi" || $day == "jeudi" || $day == "vendredi" ||
		$day == "samedi" || $day == "dimanche");
	else {
		echo "Wrong Format\n";
		exit (1);
	}

	$month = strtolower($time[3]);
	if ($month == "janvier")
		$mm = 1;
	elseif ($month == "fevrier")
		$mm = 2;
	elseif ($month == "mars")
		$mm = 3;
	elseif ($month == "avril")
		$mm = 4;
	elseif ($month == "mai")
		$mm = 5;
	elseif ($month == "juin")
		$mm = 6;
	elseif ($month == "juillet")
		$mm = 7;
	elseif ($month == "aout")
		$mm = 8;
	elseif ($month == "septembre")
		$mm = 9;
	elseif ($month == "octobre")
		$mm = 10;
	elseif ($month == "novembre")
		$mm = 11;
	elseif ($month == "decembre")
		$mm = 12;
	else {
		echo "Wrong Format\n";
		exit (1);
	}

	date_default_timezone_set("Europe/Paris");
	$res = mktime($time[5], $time[6], $time[7], $mm, $time[2], $time[4]);
	if (!$res)
		echo "Wrong Format\n";
	else
		echo $res."\n";
?>