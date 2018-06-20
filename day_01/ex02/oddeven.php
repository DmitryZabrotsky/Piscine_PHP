#!/usr/bin/php
<?php
	echo "Enter a number: ";
	$num = rtrim(fgets(STDIN));
	
	while (!feof(STDIN))
	{
		if (is_numeric($num))
		{
			if (!($num % 2))
				echo "The number $num is even\n";
			else
				echo "The number $num is odd\n";
		}
		else
		{
			echo "'$num' is not a number\n";
		}
		echo "Enter a number: ";
		$num = rtrim(fgets(STDIN));
	}

	echo "\n";
?>