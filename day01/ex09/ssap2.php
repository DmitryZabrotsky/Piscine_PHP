#!/usr/bin/php
<?php

	function	is_chr($chr)
	{
		$i = ord($chr);
		if ($i >= 97 && $i <= 122)
			return TRUE;
		else
			return FALSE;
	}
	function	is_num($chr)
	{
		$i = ord($chr);
		if ($i >= 48 && $i <= 57)
			return TRUE;
		else
			return FALSE;
	}
	function	is_chrnum($chr)
	{
		if (is_chr($chr) || is_num($chr))
			return TRUE;
		else
			return FALSE;
	}
	function	is_notchrnum($chr)
	{
		if (!is_chr($chr) && !is_num($chr))
			return TRUE;
		else
			return FALSE;
	}
	function	ascii_sort($arg1, $arg2)
	{
		$a = strtolower($arg1);
		$b = strtolower($arg2);
		$a_len = strlen($arg1);
		$b_len = strlen($arg2);
		$i = 0;
		while ($i < $a_len && $i < $b_len) 
		{
			if ($a[$i] != $b[$i]) 
			{
				if (is_chr($a[$i]) && is_chr($b[$i])) 
				{
					return ord($a[$i]) - ord($b[$i]);
				}
				else if (is_num($a[$i]) && is_num($b[$i])) 
				{
					return ord($a[$i]) - ord($b[$i]);
				}
				else if (is_chr($a[$i]) && is_num($b[$i])) 
				{
					return -1;
				}
				else if (is_num($a[$i]) && is_chr($b[$i])) 
				{
					return 1;
				}
				else if (is_chrnum($a[$i]) && is_notchrnum($b[$i])) 
				{
					return -1;
				}
				else if (is_notchrnum($a[$i]) && is_chrnum($b[$i])) 
				{
					return 1;
				}
				else if (is_notchrnum($a[$i]) && is_notchrnum($b[$i]))
				{
					return ord($a[$i]) - ord($b[$i]);
				}
			}
			$i++;
		}
		return $a_len - $b_len;
	}
	unset($argv[0]);
	$str = implode(" ", $argv);
	$arr = explode(" ", $str);
	usort($arr, 'ascii_sort');
	foreach ($arr as $val) {
		echo $val."\n";
	}
?>