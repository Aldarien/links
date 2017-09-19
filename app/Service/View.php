<?php
namespace App\Service;

use Philo\Blade\Blade;

class View
{
	protected $views;
	protected $cache;
	protected $blade;
	
	public function __construct()
	{
		$this->views = config('locations.views');
		$this->cache = config('locations.cache');
		
		$this->blade = new Blade($this->views, $this->cache);
	}
	public function show($template, $vars = null)
	{
		if ($vars) {
			return $this->blade->view()->make($template, $vars)->render();
		}
		return $this->blade->view()->make($template)->render();
	}
}
?>