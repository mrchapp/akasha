<?php
require_once("cree_light_bulb.class.php");
require_once("ge_zigbee_light.class.php");

class WinkUtils extends device
{
	static $URL = "https://winkapi.quirky.com";

	static function new_device($model_name, $id, $name)
	{
		$obj = null;
		switch ($model_name)
		{
			case "Cree light bulb":
				$obj = new cree_light_bulb();
				$obj->set_id($id);
				$obj->set_name($name);
				break;
			case "GE Light Bulb":
				$obj = new ge_zigbee_light();
				$obj->set_id($id);
				$obj->set_name($name);
				break;
			default:
				break;
		}
		return $obj;
	}

	static function get_info_from_model($model_name)
	{
		switch ($model_name)
		{
			case "HUB":
			case "Hub":
				$type = "hub";
				$idfield = $type . "_id";
				break;
			case "BE469":
				$type = "lock";
				$idfield = $type . "_id";
				break;
			case "Binary Switch":
				$type = "binary_switch";
				$idfield = $type . "_id";
				break;
			case "Connected Bulb Remote":
				$type = "remote";
				$idfield = $type . "_id";
				break;
			case "Cree light bulb":
			case "Dimmer":
			case "GE Light Bulb":
			case "Light Bulb":
			case "Lightify RGBW Bulb":
			case "Lightify RGBW Flex":
				$type = "light_bulb";
				$idfield = $type . "_id";
				break;
			case "Egg Minder":
				$type = "eggtray";
				$idfield = $type . "_id";
				break;
			case "Nimbus":
				$type = "cloud_clock";
				$idfield = $type . "_id";
				break;
			case "Pivot Power Genius":
				$type = "powerstrip";
				$idfield = $type . "_id";
				break;
			case "Smoke + Carbon Monoxide Detector":
				$type = "smoke_detector";
				$idfield = $type . "_id";
				break;
			case "Wireless Siren & Strobe":
				$type = "siren";
				$idfield = $type . "_id";
				break;
			case "Z-Wave Door / Window Transmitter":
				$type = "sensor_pod";
				$idfield = $type . "_id";
				break;
			case "Z-Wave Passive Infrared (PIR) Sensor":
				$type = "sensor_pod";
				$idfield = $type . "_id";
				break;
			default:
				break;
		}

		return array("type" => $type, "idfield" => $idfield);
	}

	static function get_type_from_model($model_name)
	{
		$info = get_info_from_model($model_name);
		return $info['type'];
	}

	static function get_idfield_from_model($model_name)
	{
		$info = get_info_from_model($model_name);
		return $info['idfield'];
	}

	static function api_put($endpoint, $data)
	{
		global $config;
		$token = $config['wink']['token_access'];

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, WinkUtils::$URL . $endpoint);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json", "Authorization: Bearer " . $token));
		$response = curl_exec($ch);
		curl_close($ch);
		return $response;
	}
}
?>
