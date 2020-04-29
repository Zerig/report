<?php
namespace Report;

class Data{

	public static function set($array = []){
		$GLOBALS["rreport"] = $array;
	}

	public static function add($item = ""){
		$GLOBALS["rreport"][] = $item;
	}



	public static function get($i = null){
		if(!isset($GLOBALS["rreport"]) && is_null($i))	return [];
		if(!isset($GLOBALS["rreport"]) && !is_null($i))	return null;

		if(is_null($i)) return (isset($GLOBALS["rreport"]))? 									$GLOBALS["rreport"] : [];
		if($i >= 0) 	return (isset($GLOBALS["rreport"][$i]))? 								$GLOBALS["rreport"][$i] : null;
		if($i < 0) 		return (isset($GLOBALS["rreport"][count($GLOBALS["rreport"]) + $i]))?	$GLOBALS["rreport"][count($GLOBALS["rreport"]) + $i] : null;
	}

	public static function groupFilter($group){
		$array = [];
		foreach($GLOBALS["rreport"] as $rep){
			if($rep->group == $group) $array[] = $rep;
		}
		return $array;
	}

	public static function exist($i = null){
		return isset( $GLOBALS["rreport"][$i] );
	}

	public static function getDepth($i = null){
		return (isset($GLOBALS["rreport"]))?	count($GLOBALS["rreport"]) : 0;
	}

	public static function clear($array = []){
		unset($GLOBALS["rreport"]);
	}


}
