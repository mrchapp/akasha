<?php
require_once("lifx_original_a21_light.class.php");

class LifxUtils extends device
{
	static $URL = "https://api.lifx.com/v1/";

	static function new_device($model_name, $id, $name)
	{
		$obj = null;
		switch ($model_name)
		{
			case "lifx_original_a21":
				$obj = new lifx_original_a21();
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
			case "lifx_original_a21":
				$type = "lights";
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
		$token = $config['lifx']['token_access'];

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, LifxUtils::$URL . $endpoint);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: Bearer " . $token));
		$response = curl_exec($ch);
		curl_close($ch);
		return $response;
	}

	static function api_put($endpoint, $data)
	{
		global $config;
		$token = $config['lifx']['token_access'];

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, LifxUtils::$URL . $endpoint);
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
