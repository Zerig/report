<?php
namespace Report;

class rData{
	public $type;
	public $text;

	public $name;

	// generate class from arrays values
	public function __construct(Array $properties=array()){
		foreach($properties as $key => $value){
			if(!is_numeric($key)){
				$this->{$key} = $value;
			}
		}
	}

}
