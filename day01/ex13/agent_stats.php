#!/usr/bin/php
<?php
	
	if ($argc != 2) {
		exit (1);
	}

	$mod = $argv[1];
	$arr = array();

// averedge

	function average($arr){
		$i = 0;
		$res = 0;
		foreach ($arr as $note) {
			$str = explode(';', $note);
			if ($str[1] != '' && $str[2] != 'moulinette') {
				$res += $str[1];
				$i++;
			}
		}
		$res = $res / $i;
		echo $res."\n"; 
	}

// average_user

	function is_in_arr($arr, $str){
		foreach ($arr as $val) {
			if ($val == $str)
				return (1);
		}
		return (0);
	}

	function get_names($arr){
		$res = array();
		foreach ($arr as $note) {
			$str = explode(';', $note);
			if ($str[0] != '') {
				$user = $str[0];
				if (!is_in_arr($res, $user)){
					array_push($res, $user);
				}
			}
		}
		return $res;
	}

	function average_by__single_user($arr, $user){
		$i = 0;
		$res = 0;
		foreach ($arr as $note) {
			$str = explode(';', $note);
			if ($str[1] != '' && $str[2] != 'moulinette' && $str[0] == $user) {
				$res += $str[1];
				$i++;
			}
		}
		$res = $res / $i;
		echo $user.":".$res."\n";
	}

	function average_user($arr){
		$names = get_names($arr);
		foreach ($names as $user) {
			average_by__single_user($arr, $user);
		}
	}

// moulinette_variance

	function moulinette_variance_user($arr, $user){
		$i = 0;
		$res = 0;
		$i_moul = 0;
		$res_moul = 0;
		foreach ($arr as $note) {
			$str = explode(';', $note);
			if ($str[1] != '' && $str[0] == $user) {
				if ($str[2] != 'moulinette') {
					$res += $str[1];
					$i++;
				}
				else {
					$res_moul += $str[1];
					$i_moul++;
				}
			}
		}
		$res = $res / $i;
		$res_moul = $res_moul / $i_moul;
		$res -= $res_moul;
		echo $user.":".$res."\n";
	}

	function moulinette_variance($arr){
		$names = get_names($arr);
		foreach ($names as $user) {
			moulinette_variance_user($arr, $user);
		}
	}

	fgets(STDIN);
	while (!feof(STDIN))
	{
		$str = fgets(STDIN);
		array_push($arr, $str);
		sort($arr);
	}

	if ($mod == 'average') {
		average($arr);
	}
	if ($mod == 'average_user') {
		average_user($arr);
	} 
	if ($mod == 'moulinette_variance') {
		moulinette_variance($arr);
	}

?>