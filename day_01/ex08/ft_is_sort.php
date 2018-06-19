<?php

	function ft_is_sort($arg)
	{
		$sorted_arr = $arg;
		sort($sorted_arr);
		if ($arg === $sorted_arr)
			return TRUE;
		return FALSE;
	}

?>