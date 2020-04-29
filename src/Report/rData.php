<?php
namespace Report;

class rData{
	public $group = null;
	public $state = null;
	public $msg = null;
	public $type = null;
	public $num = null;

	// generate class from arrays values
	public function __construct(Array $properties=array()){
		foreach($properties as $key => $value){
			if(!is_numeric($key)){
				$this->{$key} = $value;
			}
		}
	}

}
