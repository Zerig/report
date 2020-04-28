<?php
namespace Report;

class Mysql{



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
		$one =   (\Report\Data::isset(0))? \Report\Data::get(0) : "";
		$two =   (\Report\Data::isset(1))? \Report\Data::get(1) : "";
		$three = (\Report\Data::isset(2))? \Report\Data::get(2) : "";
		\Report\Data::unset();

		return sprintf($msg, $one, $two, $three);

	}


	public static function get(){
		if(!isset($GLOBALS["report"])) return [];
		return $GLOBALS["report"];
	}

}
