<?php
require_once("device.class.php");
require_once("WinkUtils.class.php");

class binary_switch extends device
{
	protected $wink_type;
	protected $wink_idfield;
	protected $status_powered;

	public function __construct()
	{
		parent::__construct();

		$this->commands["getstate"] = array(
			"required" => array(),
			"optional" => array()
			);

		$this->commands["poweron"] = array(
			"required" => array(),
			"optional" => array()
			);

		$this->commands["poweroff"] = array(
			"required" => array(),
			"optional" => array()
			);
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

	public function get_powered()
	{
		return $this->status_powered;
	}

	public function set_powered($arg)
	{
		$this->status_powered = $arg;
	}

	public function process_command($cmd, $args = null)
	{
		if (!parent::process_command($cmd, $args))
			return false;

		switch ($cmd)
		{
			case "poweron":
				$data = array("desired_state" => array(
					"powered" => true)
				);

				$endpoint = "/binary_switches/" . $this->id;
				$json_data = json_encode($data);

				return WinkUtils::api_put($endpoint, $json_data);
				break;

			case "poweroff":
				$data = array("desired_state" => array(
					"powered" => false)
				);

				$endpoint = "/binary_switches/" . $this->id;
				$json_data = json_encode($data);

				return WinkUtils::api_put($endpoint, $json_data);
				break;
			case "getstate":
				$endpoint = "/binary_switches/" . $this->id;
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
				echo $state . PHP_EOL;
				break;
			default:
				break;
		}
		return true;
	}

}

?>
