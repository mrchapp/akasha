<?php
require_once("device.class.php");

class wink_device extends device
{
	protected $wink_type;
	protected $wink_idfield;

	public function __construct()
	{
		parent::__construct();
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
}
?>
