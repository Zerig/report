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
		$one = (isset(self::getData(0)))? self::getData(0) : "";
		$two = (isset(self::getData(1)))? self::getData(1) : "";
		$three = (isset(self::getData(2)))? self::getData(2) : "";
		self::unsetData();

		return sprintf($msg, $one, $two, $three);

	}


	public static function get(){
		if(!isset($GLOBALS["report"])) return [];
		return $GLOBALS["report"];
	}

}
