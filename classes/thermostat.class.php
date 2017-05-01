<?php
require_once("classes/wink_device.class.php");

class thermostat extends wink_device
{
	public function __construct()
	{
		parent::__construct();

		$this->commands["gettemp"] = array(
			"required" => array(),
			"optional" => array()
		);

		$this->commands["poweron"] = array(
			"required" => array(),
			"optional" => array("set-point", "mode", "fan")
		);

		$this->commands["poweroff"] = array(
			"required" => array(),
			"optional" => array()
		);
	}

	public function process_command($cmd, $args = null)
	{
		if (!parent::process_command($cmd, $args))
			return false;

		switch ($cmd)
		{
			case "gettemp":
				$endpoint = "/thermostats/" . $this->id;
				$response = WinkUtils::api_get($endpoint);
				//echo "response=[$response]" . PHP_EOL;
				$json = json_decode($response, true);

				$ret = "ERR";
				$connected = $json['data']['last_reading']['connection'];
				if (!$connected)
				{
					echo $ret . " Not connected" . PHP_EOL;
					return false;
				}

				$temperature = sprintf("%.02f", $json['data']['last_reading']['temperature']);

				$ret = $temperature;
				echo $ret . PHP_EOL;
				break;
			case "poweron":
				$data = array("desired_state" => array(
					"powered" => true)
				);

				if ($args && array_key_exists("set-point", $args))
				{
					$set_point = $args["set-point"];
					$data["desired_state"]["max_set_point"] = $set_point + 0.5;
					$data["desired_state"]["min_set_point"] = $set_point - 0.5;
				}

				if ($args && array_key_exists("mode", $args))
				{
					$mode = $args["mode"];
					$data["desired_state"]["mode"] = $mode;
				}


				if ($args && array_key_exists("fan", $args))
				{
					$fan = $args["fan"];
					$data["desired_state"]["fan_mode"] = $fan;
				}

				//print_r($data);
				$endpoint = "/thermostats/" . $this->id;
				$json_data = json_encode($data);
				return WinkUtils::api_put($endpoint, $json_data);
				break;
			case "poweroff":
				$endpoint = "/thermostats/" . $this->id;

				$data = array("desired_state" => array(
					"powered" => false)
				);

				$json_data = json_encode($data);
				return WinkUtils::api_put($endpoint, $json_data);
				break;
			default:
				break;
		}
		return true;
	}
}

?>
