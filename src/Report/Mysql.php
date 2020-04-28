<?php
namespace Report;

class Mysql extends Report{



	public static function __construct($errorno, $error){

		if($errorno == 1022)  end($GLOBALS["report"]["form"][] = new Data([
			"state" => "success",
			"msg"   => "Duplicitní položka"
		]));


		end($GLOBALS["report"]["form"][] = new Data([
			"state" => "success",
			"msg"   => "Položka byla úspěšně nahrána"
		]));

	}


	public static function get(){
		if(!isset($GLOBALS["report"]["form"])) return [];
		return $GLOBALS["report"]["form"];
	}

}
