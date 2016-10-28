<?php
require_once("wink_light.class.php");

class cree_light_bulb extends wink_light
{
	function __construct()
	{
		parent::__construct();

		$this->set_spectrum_type("white");
		$this->set_icon("cree_light_bulb");
		$this->wink_type = "light_bulb";
		$this->wink_idfield = "light_bulb_id";
	}
}

?>
