<?php
namespace App\Service;

class Config
{
	protected $dir;
	protected $data;
	
	public function __construct($dir = null)
	{
		if ($dir == null) {
			$dir = dirname(__DIR__) . '/../config';
		}
		$this->dir = $dir;
		$this->load();
	}
	protected function load()
	{
		$files = glob($this->dir . '/*.php');
		foreach ($files as $file) {
			$info = pathinfo($file);
			$name = $info['filename'];
			
			$data = include_once $file;
			$data = $this->translateArray($data, $name);
			foreach ($data as $key => $value) {
				$this->add($key, $value);
			}
		}
	}
	protected function translateArray($array, $level)
	{
		$output = [];
		foreach ($array as $k1 => $l1) {
			$key = $level . '.' . $k1;
			if (is_array($l1)) {
				$output = array_merge($this->translateArray($l1, $key));
			} else {
				$output[$key] = $l1;
			}
		}
		return $output;
	}
	protected function add($field, $value)
	{
		$this->data[$field] = $this->replace($value);
	}
	protected function replace($value)
	{
		if (strpos($value, '{') !== false) {
			while(strpos($value, '{') !== false) {
				$ini = strpos($value, '{') + 1;
				$end = strpos($value, '}', $ini);
				$rep = substr($value, $ini, $end - $ini);
				$value = str_replace('{' . $rep . '}', $this->get($rep), $value);
			}
		}
		return $value;
	}
	
	public function get($name)
	{
		if (isset($this->data[$name])) {
			return $this->data[$name];
		}
		return null;
	}
}
?>