<?php
namespace Report;

class Action{


	public function start(){

	}

	public static function getDepth(){
		return (isset($GLOBALS["report"]))?	count($GLOBALS["report"]) : 0;
	}

	public static function get($i = null){
		if(!isset($GLOBALS["report"]) && is_null($i))	return [];
		if(!isset($GLOBALS["report"]) && !is_null($i))	return null;

		if(is_null($i)) return (isset($GLOBALS["report"]))? 										$GLOBALS["report"] : [];
		if($i >= 0) 	return (isset($GLOBALS["report"][$i]))? 									$GLOBALS["report"][$i] : null;
		if($i < 0) 		return (isset($GLOBALS["report"][count($GLOBALS["report"]) + $i]))?	$GLOBALS["report"][count($GLOBALS["report"]) + $i] : null;
	}



}
