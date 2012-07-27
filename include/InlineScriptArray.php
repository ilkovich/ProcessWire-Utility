<?php
class InlineScriptArray implements IteratorAggregate {

	protected $data = array();

	public function add($key, $value) {
		$this->data[$key] = $value; 
		return $this; 
	}
	
	public function prepend($key) {
		$data = array($key => $filename); 
		foreach($this->data as $k => $v) {
			if($k == $key) continue; 
			$data[$k] = $v; 
		}
		$this->data = $data; 
		return $this; 	
	}

	public function getIterator() {
		return new ArrayObject($this->data); 
	}

	public function remove($key) {
		unset($this->data[$key]); 
		return $this; 
	}

	public function removeAll() {
		$this->data = array();
		return $this; 
	}

	public function __toString() {
		return print_r($this->data, true); 
	}
}
