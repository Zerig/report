<?php
namespace Report;

class Data{

	public static function set($array = []){
		$GLOBALS["report_data"] = $array;
	}

	public static function get($i = null){
		if(!isset($GLOBALS["report_data"]) && is_null($i))	return [];
		if(!isset($GLOBALS["report_data"]) && !is_null($i))	return null;

		if(is_null($i)) return (isset($GLOBALS["report_data"]))? 										$GLOBALS["report_data"] : [];
		if($i >= 0) 	return (isset($GLOBALS["report_data"][$i]))? 									$GLOBALS["report_data"][$i] : null;
		if($i < 0) 		return (isset($GLOBALS["report_data"][count($GLOBALS["report_data"]) + $i]))?	$GLOBALS["report_data"][count($GLOBALS["report_data"]) + $i] : null;
	}

	public static function exist($i = null){
		return isset( $GLOBALS["report_data"][$i] );
	}

	public static function clear($array = []){
		unset($GLOBALS["report_data"]);
	}


}
