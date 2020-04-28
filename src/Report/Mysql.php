<?php
namespace Report;

class Mysql extends Report{



	public static function set($errno, $error){
		$conf = \Noodlehaus\Config::load(__DIR__ . '\report.json');
		$text = $conf->all();

		echo print_r($text);


		$GLOBALS["report"]["form"][] = new Data([
			"state" => "fail",
			"errno" => $errno,
			"msg"   => (isset($text["mysql"]["fail"][$errno]))? $text["mysql"]["fail"][$errno] : $text["mysql"]["fail"][0]
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
