<?php

	abstract class Fighter {

		abstract public function fight($target);

		private $_name;

		public function __construct ($type) {
			$this->_name = $type;
		}

		public function getName() {
			return $this->_name;
		}

	}

?>