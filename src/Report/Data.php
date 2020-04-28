<?php
namespace Report;

class Data{

	public static function set($array = []){
		$GLOBALS["report_data"] = $array;
	}

	public static function get($i = null){
		if(!isset($GLOBALS["report_data"]))	return null;

		if(is_null($i)) return $GLOBALS["report_data"];
		if($i >= 0) 	return $GLOBALS["report_data"][$i];
		if($i < 0) 		return $GLOBALS["report_data"][count($GLOBALS["report_data"]) + $i];
	}

	public static function exist($i = null){
		return isset( $GLOBALS["report_data"][$i] );
	}

	public static function clear($array = []){
		unset($GLOBALS["report_data"]);
	}


}
