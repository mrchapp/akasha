<?php
require_once("wink_lock.class.php");

class schlage_zwave_lock extends wink_lock
{
	function __construct()
	{
		parent::__construct();

		$this->set_icon("schlage_zwave_lock");
		$this->wink_type = "lock";
		$this->wink_idfield = "lock_id";
	}
}

?>
