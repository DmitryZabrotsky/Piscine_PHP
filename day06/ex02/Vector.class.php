<?php

	require_once '../ex01/Vertex.class.php';

	class Vector {

		private $_x;
		private $_y;
		private $_z;
		private $_w;

		public static $verbose = FASLE;

		public function __construct($arr) {

			if (isset($arr["dest"]) && $arr['dest'] instanceof Vertex) {
				$this->_x = $arr['dest']->getX();
				$this->_y = $arr['dest']->getY();
				$this->_z = $arr['dest']->getZ();
				$this->_w = 0;

				if (isset($arr["orig"]) && $arr['orig'] instanceof Vertex) {
					$orig = $arr['orig'];
				}
				else {
					$orig = new Vertex (array ("x" => 0, "y" => 0, "z" => 0, "w" => 1));
				}
				
				$this->_x -= $orig->getX();
				$this->_y -= $orig->getY();
				$this->_z -= $orig->getZ();
			}

			if (self::$verbose) {
				echo $this." constructed.\n";
			}
		}

		public function __destruct() 
		{
			if (self::$verbose) {
				echo $this."destructed\n";
			}
		}

		public function __toString() 
		{
			return ("Vector( x: " . sprintf("%.2f", $this->_x) .", y: " . sprintf("%.2f", $this->_y) . ", z: ". sprintf("%.2f", $this->_z) .", w: ". sprintf("%.2f", $this->_w)." )");
		}

		public function doc() 
		{
			$doc = file_get_contents("Vector.doc.txt");
			echo "\n".$doc."\n";
		}

		public function magnitude() 
		{
	   	    return (float)sqrt(($this->_x * $this->_x) + ($this->_y * $this->_y) + ($this->_z * $this->_z));
	    }

	    public function normalize() 
	    {
	    	if (($len = $this->magnitude()) == 1)
	    		return clone $this;
	    	$x = $this->_x / $len;
	    	$y = $this->_y / $len;
	    	$z = $this->_z / $len;
	    	$dest = new Vertex(array( 'x' => $x, 'y' => $y, 'z' => $z ));
	    	return (new Vector(array( "dest" => $dest)));
	    }

	    public function add(Vector $rhs)
	    {
	    	$x = $this->_x + $rhs->_x;
	    	$y = $this->_y + $rhs->_y;
	    	$z = $this->_z + $rhs->_z;
	    	$dest = new Vertex(array( 'x' => $x, 'y' => $y, 'z' => $z ));
	    	return (new Vector(array( "dest" => $dest)));
	    }

	    public function sub(Vector $rhs)
	    {
	    	$x = $this->_x - $rhs->_x;
	    	$y = $this->_y - $rhs->_y;
	    	$z = $this->_z - $rhs->_z;
	    	$dest = new Vertex(array( 'x' => $x, 'y' => $y, 'z' => $z ));
	    	return (new Vector(array( "dest" => $dest)));
	    }

	    public function opposite()
	    {
	    	$x = $this->_x * -1;
	    	$y = $this->_y * -1;
	    	$z = $this->_z * -1;
	    	$dest = new Vertex(array( 'x' => $x, 'y' => $y, 'z' => $z ));
	    	return (new Vector(array( "dest" => $dest)));
	    }

	    public function scalarProduct($k)
	    {
	    	$x = $this->_x * $k;
	    	$y = $this->_y * $k;
	    	$z = $this->_z * $k;
	    	$dest = new Vertex(array( 'x' => $x, 'y' => $y, 'z' => $z ));
	    	return (new Vector(array( "dest" => $dest)));
	    }

	    public function dotProduct(Vector $rhs)
	    {
	    	return (float)(($this->_x * $rhs->_x) + ($this->_y * $rhs->_y) + ($this->_z * $rhs->_z));
	    }

	    public function cos(Vector $rhs)
	    {
	    	return (float)((($this->_x * $rhs->_x) + ($this->_y * $rhs->_y) + ($this->_z * $rhs->_z)) / sqrt((($this->_x * $this->_x) + ($this->_y * $this->_y) + ($this->_z * $this->_z)) * (($rhs->_x * $rhs->_x) + ($rhs->_y * $rhs->_y) + ($rhs->_z * $rhs->_z))));
	    }

	    public function crossProduct(Vector $rhs)
	    {
	    	$x = $this->_y * $rhs->_z - $this->_z * $rhs->_y;
	    	$y = $this->_z * $rhs->_x - $this->_x * $rhs->_z;
	    	$z = $this->_x * $rhs->_y - $this->_y * $rhs->_x;
	    	$dest = new Vertex(array( 'x' => $x, 'y' => $y, 'z' => $z ));
	    	return (new Vector(array( "dest" => $dest)));
	    }

	    public function getX()
	  	{
	  		return ($this->_x);
	  	}

	  	public function getY()
	  	{
	  		return ($this->_y);
	  	}

	  	public function getZ()
	  	{
	  		return ($this->_z);
	  	}

	  	public function getW()
	  	{
	  		return ($this->_w);
	  	}

	}

?>