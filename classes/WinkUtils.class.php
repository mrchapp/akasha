<?php
require_once("devices/cree_light_bulb.class.php");
require_once("devices/ge_jasco_binary.class.php");
require_once("devices/ge_jasco_dimmer.class.php");
require_once("devices/ge_zigbee_light.class.php");
require_once("devices/schlage_zwave_lock.class.php");
require_once("devices/sylvania_sylvania_rgbw.class.php");
require_once("devices/sylvania_sylvania_rgbw_flex.class.php");
require_once("devices/generic_zwave_light_bulb_scene_switch_multilevel.class.php");

class WinkUtils extends device
{
	static $URL = "https://winkapi.quirky.com";

	static function new_device($model_name, $id, $name)
	{
		$obj = null;
		switch ($model_name)
		{
			case "BE469":
				$obj = new schlage_zwave_lock();
				$obj->set_id($id);
				$obj->set_name($name);
				break;
			case "Binary Switch":
				$obj = new ge_jasco_binary();
				$obj->set_id($id);
				$obj->set_name($name);
				break;
			case "Cree light bulb":
				$obj = new cree_light_bulb();
				$obj->set_id($id);
				$obj->set_name($name);
				break;
			case "Dimmer":
				$obj = new ge_jasco_dimmer();
				$obj->set_id($id);
				$obj->set_name($name);
				break;
			case "GE Light Bulb":
				$obj = new ge_zigbee_light();
				$obj->set_id($id);
				$obj->set_name($name);
				break;
			case "Lightify RGBW Bulb":
				$obj = new sylvania_sylvania_rgbw();
				$obj->set_id($id);
				$obj->set_name($name);
				break;
			case "Lightify RGBW Flex":
				$obj = new sylvania_sylvania_rgbw_flex();
				$obj->set_id($id);
				$obj->set_name($name);
				break;
			case "Light Bulb":
				$obj = new generic_zwave_light_bulb_scene_switch_multilevel();
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

	static function api_get($endpoint)
	{
		global $config;
		$token = $config['wink']['token_access'];

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, WinkUtils::$URL . $endpoint);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json", "Authorization: Bearer " . $token));
		$response = curl_exec($ch);
		curl_close($ch);
		return $response;
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
