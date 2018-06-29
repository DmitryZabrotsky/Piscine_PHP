<?php

include('/Users/dzabrots/PHP/git/day_07/ex01/Greyjoy.class.php');

class Euron extends Greyjoy {
	public function announceMotto() {
		print($this->familyMotto . PHP_EOL);
	}
}

?>
