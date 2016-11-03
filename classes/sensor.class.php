<?php
require_once("classes/wink_device.class.php");

class sensor extends wink_device
{
	protected $sensor_type;

	public function get_sensor_type()
	{
		return $this->sensor_type;
	}

	public function set_sensor_type($arg)
	{
		$this->sensor_type = $arg;
	}

	public function __construct()
	{
		parent::__construct();

		$this->commands["getstate"] = array(
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
			case "getstate":
				$endpoint = "/sensor_pods/" . $this->id;
				$response = WinkUtils::api_get($endpoint);
				$json = json_decode($response, true);

				$ret = "ERR";
				$connected = $json['data']['last_reading']['connection'];
				if (!$connected)
				{
					echo $ret . " Not connected" . PHP_EOL;
					return false;
				}

				$temperature="";
				switch ($this->sensor_type)
				{
					case "linear_wapirz_1":
						$status = $json['data']['last_reading']['motion'];
						$temperature = " " . sprintf("%.02f", $json['data']['last_reading']['temperature']);
						switch ($status)
						{
							case true:
								$state = "MOTION";
								break;
							case false:
								$state = "NOMOTION";
								break;
							default:
								return false;
								break;
						}
						break;
					case "linear_wadwaz_1":
						$status = $json['data']['last_reading']['opened'];
						switch ($status)
						{
							case true:
								$state = "OPEN";
								break;
							case false:
								$state = "CLOSED";
								break;
							default:
								return false;
								break;
						}
						break;
					default:
						return false;
						break;
				}

				$ret = $state . $temperature;
				echo $ret . PHP_EOL;
				break;
			case "getmotion":
				$endpoint = "/sensor_pods/" . $this->id;
				$response = WinkUtils::api_get($endpoint);
				$json = json_decode($response, true);

				$ret = "ERR";
				$connected = $json['data']['last_reading']['connection'];
				if (!$connected)
				{
					echo $ret . " Not connected" . PHP_EOL;
					return false;
				}

				$temperature="";
				switch ($this->sensor_type)
				{
					case "linear_wapirz_1":
						$status = $json['data']['last_reading']['motion'];
						switch ($status)
						{
							case true:
								$state = "MOTION";
								break;
							case false:
								$state = "NOMOTION";
								break;
							default:
								return false;
								break;
						}
						break;
					case "linear_wadwaz_1":
					default:
						return false;
						break;
				}

				$ret = $state . $temperature;
				echo $ret . PHP_EOL;
				break;
			case "gettemp":
				$endpoint = "/sensor_pods/" . $this->id;
				$response = WinkUtils::api_get($endpoint);
				$json = json_decode($response, true);

				$ret = "ERR";
				$connected = $json['data']['last_reading']['connection'];
				if (!$connected)
				{
					echo $ret . " Not connected" . PHP_EOL;
					return false;
				}

				switch ($this->sensor_type)
				{
					case "linear_wapirz_1":
						$temperature = sprintf("%.02f", $json['data']['last_reading']['temperature']);
						break;
					case "linear_wadwaz_1":
					default:
						return false;
						break;
				}

				$ret = $temperature;
				echo $ret . PHP_EOL;
				break;
			default:
				break;
		}
		return true;
	}
}

?>
