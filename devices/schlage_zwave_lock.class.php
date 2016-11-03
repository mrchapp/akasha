<?php
require_once("classes/lock.class.php");

class schlage_zwave_lock extends lock
{
	function __construct()
	{
		parent::__construct();

		$this->wink_type = "lock";
		$this->wink_idfield = "lock_id";
                $this->device_type = "BE469";
	}
}

?>
