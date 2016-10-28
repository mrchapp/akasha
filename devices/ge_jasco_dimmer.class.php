<?php
require_once("dimmer.class.php");

class ge_jasco_dimmer extends dimmer
{
	function __construct()
	{
		parent::__construct();

		$this->set_icon("ge_jasco_dimmer");
		$this->wink_type = "dimmer";
		$this->wink_idfield = "dimmer_id";
	}
}

?>
