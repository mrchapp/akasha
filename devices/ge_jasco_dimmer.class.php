<?php
require_once("dimmer.class.php");

class ge_jasco_dimmer extends dimmer
{
	function __construct()
	{
		parent::__construct();

		$this->wink_type = "dimmer";
		$this->wink_idfield = "dimmer_id";
		$this->device_type = "Dimmer";
	}
}

?>
