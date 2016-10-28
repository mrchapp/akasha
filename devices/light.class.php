<?php
require_once("device.class.php");

class light extends device
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

		$this->commands["poweron"] = array(
						   "required" => array(),
						   "optional" => array("intensity")
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
		return true;
	}

}

?>
