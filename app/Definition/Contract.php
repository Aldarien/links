<?php
namespace App\Definition;

trait Contract
{
	protected static $instance = null;
	
	private function __construct() {}
	
	protected static function getInstance()
	{
		if (self::$instance == null) {
			self::$instance = static::newInstance();
		}
		return self::$instance;
	}
	
	abstract protected static function newInstance();
}
?>