<?php
	class Tyrion extends Lannister
	{
		public function sleepWith($who) {
			if (is_subclass_of($who, Lannister)) {
				print("Not even if I'm drunk !" . PHP_EOL);
			}
			else {
				print("Let's do this." . PHP_EOL);
			}
		}
	}
?>