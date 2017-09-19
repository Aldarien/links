<?php
namespace App\Contract;

use App\Definition\Contract;
use App\Service\View as ViewService;

class View
{
	use Contract;
	
	protected static function newInstance()
	{
		return new ViewService();
	}
	public static function show($template, $variables = null)
	{
		$instance = self::getInstance();
		return $instance->show($template, $variables);
	}
}
?>