<?php

	Class Dice {

		private static $_dice = NULL;

		private function __construct() {
			
		}

		public function doc() {
			return (file_get_contents('Class.Dice.doc'));
		}

		public static function getDice() {
			if (self::$_dice == NULL)
			{
				self::$_dice = new Dice();
			}
			return self::$_dice;
		}

		public function throw() {
			return (rand(1, 6));
		}

	}

	$dice = Dice::getDice();
	echo $dice->throw();

?>