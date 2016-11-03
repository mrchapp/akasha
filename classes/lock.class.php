<?php
require_once("classes/wink_device.class.php");

class lock extends wink_device
{
	protected $status_locked;

	public function get_locked_status()
	{
		return $this->status_locked;
	}

	public function set_locked_status($state)
	{
		$this->status_locked = $state;
	}

	public function __construct()
	{
		parent::__construct();

		$this->commands["getstate"] = array(
			"required" => array(),
			"optional" => array()
			);

		$this->commands["lock"] = array(
			"required" => array(),
			"optional" => array()
			);

		$this->commands["unlock"] = array(
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
			case "unlock":
				$data = array("desired_state" => array(
					"locked" => "false")
				);

				$endpoint = "/locks/" . $this->id;
				$json_data = json_encode($data);

				return WinkUtils::api_put($endpoint, $json_data);
				break;

			case "lock":
				$data = array("desired_state" => array(
					"locked" => "true")
				);

				$endpoint = "/locks/" . $this->id;
				$json_data = json_encode($data);

				return WinkUtils::api_put($endpoint, $json_data);
				break;

			case "getstate":
				$endpoint = "/locks/" . $this->id;
				$response = WinkUtils::api_get($endpoint);
				$json = json_decode($response, true);
				$ret = "ERR";
				$connected = $json['data']['last_reading']['connection'];
				if (!$connected)
				{
					echo $ret . " Not connected" . PHP_EOL;
					return false;
				}

				$locked = $json['data']['last_reading']['locked'];

				switch ($locked)
				{
					case 1:
						$ret = "LOCKED";
						break;
					case 0:
						$ret = "UNLOCKED";
						break;
					default:
						return false;
						break;
				}
				echo $ret . PHP_EOL;
				break;
			default:
				break;
		}
		return true;
	}

}

?>
