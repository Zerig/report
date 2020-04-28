<?php
namespace Report;

class Form extends Report{



	public static function insert($result){

		if(!$result) $GLOBALS["report"]["form"][] = new Data([
			"state" => "fail",
			"msg"   => "Položka nebyla nahrána!"
		]);

		if($result)  $GLOBALS["report"]["form"][] = new Data([
			"state" => "success",
			"msg"   => "Položka byla úspěšně nahrána"
		]);


	}


	public static function get(){
		if(!isset($GLOBALS["report"]["form"])) return [];
		return $GLOBALS["report"]["form"];
	}

}
