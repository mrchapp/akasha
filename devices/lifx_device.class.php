<?php
require_once("device.class.php");

class lifx_device extends device
{
	protected $lifx_type;
	protected $lifx_idfield;

	public function __construct()
	{
		parent::__construct();
	}

	public function get_lifx_type()
	{
		return $this->lifx_type;
	}

	public function set_lifx_type($arg)
	{
		$this->lifx_type = $arg;
	}

	public function get_lifx_idfield()
	{
		return $this->lifx_idfield;
	}

	public function set_lifx_idfield($arg)
	{
		$this->lifx_idfield = $arg;
	}
}
?>
