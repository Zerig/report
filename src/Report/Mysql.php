<?php
namespace Report;

class Mysql extends Report{



	public static function set($mysql, $sql){
		$errno = $mysql->errno;
		$error = $mysql->error;

		$msg = self::setMsg($errno);


		$GLOBALS["report"][] = new Data([
			"state" => "fail",
			"errno" => $errno,
			"msg"   => $msg
		]);
		return;

	}


	private function setMsg($errno){
		// LOAD JSON DATA
		$conf = \Noodlehaus\Config::load(__DIR__ . '\report.json');
		$text = $conf->all();

		// CHOOSE teh BEST JSON MSG
		$msg = (isset($text["mysql"]["fail"][$errno]))? $text["mysql"]["fail"][$errno] : $text["mysql"]["fail"][0];

		// ADD VARIABLE in IT
		$one = (isset($GLOBALS["r"][0]))? $GLOBALS["r"][0] : "";
		$two = (isset($GLOBALS["r"][1]))? $GLOBALS["r"][1] : "";
		$three = (isset($GLOBALS["r"][2]))? $GLOBALS["r"][2] : "";
		unset($GLOBALS["r"]);

		return sprintf($msg, $one, $two, $three);

	}


	public static function get(){
		if(!isset($GLOBALS["report"])) return [];
		return $GLOBALS["report"];
	}

}
