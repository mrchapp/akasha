<?php
require_once("device.class.php");

class lock extends device
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
		return true;
	}

}

?>
