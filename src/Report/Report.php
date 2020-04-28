<?php
namespace Report;

class Report{

	public static function setData($array = []){
		$GLOBALS["report_data"] = $array;
	}

	public static function getData($i = null){
		if(is_null($i)) return $GLOBALS["report_data"];
		if($i >= 0) 	return $GLOBALS["report_data"][$i];
		if($i < 0) 		return $GLOBALS["report_data"][count($GLOBALS["report_data"]) + $i];
	}

	public static function unsetData($array = []){
		unset($GLOBALS["report_data"]);
	}


}
