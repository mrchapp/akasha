<?php
require_once("binary_switch.class.php");

class ge_jasco_binary extends binary_switch
{
	protected $wink_type;
	protected $wink_idfield;

	function __construct()
	{
		parent::__construct();

		$this->set_icon("ge_jasco_binary");
		$this->wink_type = "binary_switch";
		$this->wink_idfield = "binary_switch_id";
	}
}

?>
