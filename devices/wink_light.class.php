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
			default:
				break;
		}
		return true;
	}
}

?>
