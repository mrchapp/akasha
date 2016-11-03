<?php
require_once("classes/lifx.light.class.php");

class lifx_original_a21 extends lifx_light
{
	function __construct()
	{
		parent::__construct();

		$this->set_spectrum_type("color");
		$this->lifx_type = "lights";
		$this->lifx_idfield = "id";
		$this->lifx_type = "lifx_original_a21";
		$this->device_type = "lifx_original_a21";
	}
}

?>
