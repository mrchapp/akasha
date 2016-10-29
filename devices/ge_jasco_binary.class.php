<?php
require_once("binary_switch.class.php");

class ge_jasco_binary extends binary_switch
{
	function __construct()
	{
		parent::__construct();

		$this->wink_type = "binary_switch";
		$this->wink_idfield = "binary_switch_id";
		$this->device_type = "Binary Switch";
	}
}

?>
