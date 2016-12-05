<?php

namespace Application;

class View
	implements \Countable
{
	protected $data = [];
	
	public function __set($key, $value)
	{
		$this->data[$key] = $value;
	}
	
	public function __get($key)
	{
		return $this->data[$key];
	}
	
	public function __isset($key)
	{
		return array_key_exists($key, $this->data);
	}
	
	public function display($template)
	{
		echo $this->render($template);
	}
	
	public function render($template)
	{
		ob_start();
		
		foreach ($this->data as $property => $value){
			$$property = $value;
		}
		
		include $template;
		$content = ob_get_contents();
		ob_end_clean();
		
		return $content;
	}
	
	public function count()
	{
		return count($this->data);
	}
}