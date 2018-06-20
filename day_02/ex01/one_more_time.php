#!/usr/bin/php
<?php
	
	if ($argc != 2)
		exit (1);
	if (preg_match("/^([A-Za-z][a-z]+) (\d\d?) ([A-Za-z][a-z]+) (\d\d\d\d) (\d\d):(\d\d):(\d\d)$/", $argv[1], $time) === 0) {
		echo "Wrong Format\n";
		exit (1);
	}

	$day = strtolower($time[1]);
	if ($day == "lundi" || $day == "mardi" || $day == "mercredi" || $day == "jeudi" || $day == "vendredi" || $day == "samedi" || $day == "dimanche");
	else
		echo "Wrong Format\n";

	$month = strtolower($time[3])
	if ($month == "" || $month == "" || $month == "" || $month == "" || $month == "" || $month == "" || $month == "" || $month == "" || $month == "" || $month == "" || $month == "" || $month == "" ||)
?>