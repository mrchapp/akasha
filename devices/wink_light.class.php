<?php
require_once("light.class.php");

class wink_light extends light
{
	protected $wink_type;
	protected $wink_idfield;

	public function __construct()
	{
		parent::__construct();
	}

	public function get_wink_type()
	{
		return $this->wink_type;
	}

	public function set_wink_type($arg)
	{
		$this->wink_type = $arg;
	}

	public function get_wink_idfield()
	{
		return $this->wink_idfield;
	}

	public function set_wink_idfield($arg)
	{
		$this->wink_idfield = $arg;
	}

	public function process_command($cmd, $args = null)
	{
		if (!parent::process_command($cmd, $args))
			return false;

		switch ($cmd)
		{
			case "poweron":
				$intensity = 1.00;
				if ($args && array_key_exists("intensity", $args))
				{
					$intensity = $args["intensity"];
				}
				$data = array("desired_state" => array(
					"powered" => true,
					"brightness" => $intensity)
				);

				$endpoint = "/light_bulbs/" . $this->id;
				$json_data = json_encode($data);

				return WinkUtils::api_put($endpoint, $json_data);
				break;

			case "poweroff":
				$intensity = 1.00;
				if ($args && array_key_exists("intensity", $args))
				{
					$intensity = $args["intensity"];
				}

				$data = array("desired_state" => array(
					"powered" => false,
					"brightness" => $intensity)
				);

				$endpoint = "/light_bulbs/" . $this->id;
				$json_data = json_encode($data);

				return WinkUtils::api_put($endpoint, $json_data);
				break;
			case "getstate":
				$endpoint = "/light_bulbs/" . $this->id;
				$response = WinkUtils::api_get($endpoint);
				$json = json_decode($response, true);

				$ret = "ERR";
				$connected = $json['data']['last_reading']['connection'];
				if (!$connected)
				{
					echo $ret . " Not connected" . PHP_EOL;
					return false;
				}
				$powered = $json['data']['last_reading']['powered'];
				$intensity = sprintf("%.02f", $json['data']['last_reading']['brightness']);
				switch ($powered)
				{
					case true:
						$state = "ON";
						break;
					case false:
						$state = "OFF";
						break;
					default:
						return false;
						break;
				}
				$ret = $state . " " . $intensity;
				echo $ret . PHP_EOL;
				break;
			default:
				break;
		}
		return true;
	}
}

?>
