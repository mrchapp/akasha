<?php
require_once("classes/device.class.php");

class cuby extends device
{
	public function __construct()
	{
		parent::__construct();

		$this->commands["gettemp"] = array(
			"required" => array(),
			"optional" => array()
		);

		$this->commands["poweron"] = array(
			"required" => array("set-point"),
			"optional" => array("mode", "fan")
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
				$data = array();
				$data["cubyid"] = $this->id;
				$response = CubyUtils::api_data($data);
				$json = json_decode($response, true);

				$ret = "ERR";
				if (array_key_exists("data", $json))
				{
					$jdata = json_decode($json['data']);
					foreach ($jdata as $cubydev)
					{
						if ($cubydev->id != $this->id)
							continue;

						$ftemp = $cubydev->temperature;
						$ctemp = ($ftemp - 32) * 5 / 9;
						//$rh = $cubydev->humidity;
						$ret = sprintf("%.1f", $ctemp);
					}
				}

				echo $ret . PHP_EOL;
				break;
			case "poweron":
				$data = array();
				$data["cubyid"] = $this->id;
				$data["type"] = "power";
				$data["power"] = "on";
				// can be one of: "heat", "cool", "auto". "fan", "dry"
				if ($args && array_key_exists("mode", $args))
				{
					$mode = $args["mode"];
					$data["mode"] = $mode;
				}

				if ($args && array_key_exists("set-point", $args))
				{
					$set_point = $args["set-point"];
					$data["temperature"] = $set_point;
				}

				// can be one of: "auto", "low", "mid", "high"
				if ($args && array_key_exists("fan", $args))
				{
					$fan = $args["fan"];
					$data["fan"] = $fan;
				}

				$response = CubyUtils::api_cmd($data);
				$json = json_decode($response, true);
				break;
			case "poweroff":
				$data = array();
				$data["cubyid"] = $this->id;
				$data["type"] = "power";
				$data["power"] = "off";
				$response = CubyUtils::api_cmd($data);
				$json = json_decode($response, true);
				break;
		}
	}
}
?>
