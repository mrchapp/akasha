<?php
require_once("classes/sensor.class.php");

class linear_wapirz_1 extends sensor
{
	function __construct()
	{
		parent::__construct();

		$this->set_sensor_type("linear_wapirz_1");
		$this->wink_type = "sensor_pods";
		$this->wink_idfield = "sensor_pod_id";
		$this->device_type = "Z-Wave Passive Infrared (PIR) Sensor";

		$this->commands["getmotion"] = array(
			"required" => array(),
			"optional" => array()
		);

		$this->commands["gettemp"] = array(
			"required" => array(),
			"optional" => array()
		);
	}
}

?>
