<?php

function ft_split($arg)
{
	$ret = explode(" ", $arg);
	sort($ret);
	$i = 0;
	foreach ($ret as $arr) {
		if ($arr === "")
			unset($ret[$i]);
		$i++;
	}
	return $ret;
}

?>