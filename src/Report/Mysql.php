<?php
namespace Report;

class Mysql extends Report{



	public static function set($errno, $error){
		$conf = \Noodlehaus\Config::load('report.json');
		$text = $conf->all();


		$GLOBALS["report"]["form"][] = new Data([
			"state" => "fail",
			"errno" => $errno,
			"msg"   => $text["Mysql"]["fail"][$error]
		]);
		return;


		if($errno == 1062){
			$GLOBALS["report"]["form"][] = new Data([
				"state" => "fail",
				"errno" => $errno,
				"msg"   => $error
			]);
			return;
		}


		if($errno == 1146){
			$GLOBALS["report"]["form"][] = new Data([
				"state" => "fail",
				"errno" => $errno,
				"msg"   => "Tabulka neexistuje"
			]);
			return;
		}


		$GLOBALS["report"]["form"][] = new Data([
			"state" => "success",
			"errno" => $errno,
			"msg"   => "Položka byla úspěšně nahrána: ".$errno
		]);

	}


	public static function get(){
		if(!isset($GLOBALS["report"]["form"])) return [];
		return $GLOBALS["report"]["form"];
	}

}
