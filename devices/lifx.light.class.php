<?php
require_once("lifx_device.class.php");
require_once("color.class.php");

class lifx_light extends lifx_device
{
	protected $spectrum_type;
	protected $status_powered;
	protected $status_intensity;

	public function get_spectrum_type()
	{
		return $this->spectrum_type;
	}

	public function set_spectrum_type($arg)
	{
		$this->spectrum_type = $arg;
	}

	public function get_powered()
	{
		return $this->status_powered;
	}

	public function set_powered($arg)
	{
		$this->status_powered = $arg;
	}

	public function get_intensity()
	{
		return $this->status_intensity;
	}

	public function set_intensity($arg)
	{
		$this->status_intensity = $arg;
	}

	public function __construct()
	{
		parent::__construct();

		$this->commands["getstate"] = array(
			"required" => array(),
			"optional" => array()
			);

		$this->commands["poweron"] = array(
			"required" => array(),
			"optional" => array("intensity", "color")
			);

		$this->commands["poweroff"] = array(
			"required" => array(),
			"optional" => array("intensity")
			);
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
				if ($args && array_key_exists("color", $args))
				{
					$colorParam = $args["color"];
					$colorObj = new Color();
					$colorObj->setColor($colorParam);
					$color=$colorObj->getLifxColorString();
				} else
				{
					$colorObj = new Color();
					$colorObj->setColor("white");
					$color=$colorObj->getLifxColorString();
				}
				$data = array("power" => "on",
					      "brightness" => $intensity,
					      "color" => $color
				);
				$endpoint = "/lights/" . $this->id ."/state";
				$json_data = json_encode($data);

				return LifxUtils::api_put($endpoint, $json_data);
				break;
			case "poweroff":
				$data = array("power" => "off"
				);
				$endpoint = "/lights/" . $this->id ."/state";
				$json_data = json_encode($data);

				return LifxUtils::api_put($endpoint, $json_data);
				break;
			case "getstate":
				$endpoint = "/lights/" . $this->id;
				$response = LifxUtils::api_get($endpoint);
				$json = json_decode($response, true);

                                $ret = "ERR";
                                $connected = $json['0']['connected'];
                                if (!$connected)
                                {
                                        echo $ret . " Not connected" . PHP_EOL;
                                        return false;
                                }
				$powered = $json['0']['power'];
				$intensity = sprintf("%.02f", $json['0']['brightness']);
				switch ($powered)
				{
					case "on":
						$state = "ON";
						break;
					case "off":
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
