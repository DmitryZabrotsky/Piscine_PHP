<?php

	class UnholyFactory {

		private $_squad = array();

		public function absorb($warrior) {
			if ($warrior instanceof Fighter) 
			{
				if ($warrior->getName())
				{
					if (in_array($warrior->getName(), $this->_squad))
					{
						echo "(Factory already absorbed a fighter of type ".$warrior->getName." soldier)\n";
					}
					else 
					{
						$this->_squad = array_merge(array($warrior->getName() => $warrior), $this->_squad);
						echo "(Factory absorbed a fighter of type ".$warrior->getName()." soldier)\n";
					}
				}
				else
				{
					echo "(Factory can't absorb this, it's not a fighter)\n";
				}
			}
		}

		public function fabricate($name) {
			if (isset($this->_squad[$name]))
			{
				echo "(Factory fabricates a fighter of type ".$name.")\n";
				return (clone $this->_squad[$name]);
			}
			else
			{
				echo "(Factory hasn't absorbed any fighter of type ".$name.")\n";
			}
		}

	}

?>