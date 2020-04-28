<?php
namespace Report;

class Mysql extends Report{



	public static function set($mysql, $sql){
		$errno = $mysql->errno;
		$error = $mysql->error;

		$conf = \Noodlehaus\Config::load(__DIR__ . '\report.json');
		$text = $conf->all();


		$msg = (isset($text["mysql"]["fail"][$errno]))? $text["mysql"]["fail"][$errno] : $text["mysql"]["fail"][0];
		if(isset($GLOBALS["r"][0])){
			$msg .= $GLOBALS["r"][0];
		}
		unset($GLOBALS["r"]);

		$GLOBALS["report"]["form"][] = new Data([
			"state" => "fail",
			"errno" => $errno,
			"msg"   => $msg
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
