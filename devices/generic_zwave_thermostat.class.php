<?php
require_once("classes/thermostat.class.php");

class generic_zwave_thermostat extends thermostat
{
	public function __construct()
	{
		parent::__construct();

		$this->wink_type = "thermostat";
		$this->wink_idfield = "thermostat_id";
		$this->device_type = "generic_zwave_thermostat";
	}
}

?>
