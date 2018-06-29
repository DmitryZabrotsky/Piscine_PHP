<?php
	class Jaime extends Lannister
	{
		public function sleepWith($who) {
			if ($who instanceof Cersei) {
				print("With pleasure, but only in a tower in Winterfell, then." . PHP_EOL);
			}
			else if (is_subclass_of($who, Lannister)) {
				print("Not even if I'm drunk !" . PHP_EOL);
			}
			else {
				print("Let's do this." . PHP_EOL);
			}
		}
	}
?>