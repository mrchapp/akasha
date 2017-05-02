<?php
require_once("devices/cuby.class.php");

class CubyUtils extends device
{
	static $endpoint_cmd =  "https://cuby.io/api/v1/cuby/cmd";
	static $endpoint_data = "https://cuby.io/api/v1/users/cuby/data";

	static function new_device($id, $name)
	{
		$obj = null;
		$obj = new cuby();
		$obj->set_id($id);
		$obj->set_name($name);
		$obj->set_device_type("Cuby");
		return $obj;
	}

	static function data2url($data)
	{
		if (!is_array($data))
			return FALSE;

		$d = "";
		foreach($data as $key => $val)
		{
			$d .= $key . "=" . $val . "&";
		}

		if (substr($d, -1) == "&")
			$d = substr($d, 0, strlen($d) - 1);

		return $d;
	}

	static function api_get($url)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		$response = curl_exec($ch);
		curl_close($ch);
		return $response;
	}

	static function api_cmd($cmd)
	{
		global $config;
		$token = $config['cuby']['token_access'];
		$user =  $config['cuby']['user'];
		$cmd_copy = $cmd;
		$cmd_copy["username"] = $user;
		$cmd_copy["token"] = $token;
		$url = CubyUtils::$endpoint_cmd . "?" . CubyUtils::data2url($cmd_copy);
		return CubyUtils::api_get($url);
	}

	static function api_data($data)
	{
		global $config;
		$token = $config['cuby']['token_access'];
		$user =  $config['cuby']['user'];
		$data_copy = $data;
		$data_copy["username"] = $user;
		$data_copy["token"] = $token;
		$url = CubyUtils::$endpoint_data . "?" . CubyUtils::data2url($data_copy);
		return CubyUtils::api_get($url);
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
