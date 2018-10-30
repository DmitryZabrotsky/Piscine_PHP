<?php

class Color {

	public $red = 0;
	public $green = 0;
	public $blue = 0;

	public static $verbose = FALSE;

	public function __construct ($color) {

		if (isset($color["red"]) && isset($color["green"]) && isset($color["blue"]))
		{
			$color["rgb"] = intval($color["rgb"]);
			$this->red = $color["red"];
			$this->green = $color["green"];
			$this->blue = $color["blue"];
		} 
		elseif (isset($color["rgb"]))
		{
			$this->red = ($color["rgb"] >> 16) & 0xFF;
			$this->green = ($color["rgb"] >> 8) & 0xFF;
			$this->blue = $color["rgb"] & 0xFF;
		}
		if (self::$verbose) {
			echo $this."constructed.\n";
		}
	}

	public function __destruct () {

		if (self::$verbose) {
			echo $this."destructed.\n";
		}
	}

	public function __toString() {

		return ("Color( red: ".sprintf("%3s", $this->red).", green: ".sprintf("%3s", $this->green).", blue: ".sprintf("%3s", $this->blue)." ) ");
	}

	public function doc() {

		$doc = file_get_contents('Color.doc.txt');
		return "\n".$doc."\n";
	}

	public function add($color) {

		$red = $this->red + $color->red;
		$green = $this->green + $color->green;
		$blue = $this->blue + $color->blue;
		return new Color ( array( 'red' => $red, 'green' => $green, 'blue' => $blue ) );
	}

	public function sub($color) {

		$red = $this->red - $color->red;
		$green = $this->green - $color->green;
		$blue = $this->blue - $color->blue;
		return new Color ( array( 'red' => $red, 'green' => $green, 'blue' => $blue ) );
	}

	public function mult($multiplier) {

		$red = $this->red * $multiplier;
		$green = $this->green * $multiplier;
		$blue = $this->blue * $multiplier;
		return new Color ( array( 'red' => $red, 'green' => $green, 'blue' => $blue ) );
	}

}

?>