<?php
namespace Report;

class Mysql{



	public static function set($mysql, $sql){
		$errno = $mysql->errno;
		$error = $mysql->error;

		$msg = self::setMsg($errno);


		$GLOBALS["report"][] = new rData([
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
		$num = substr_count($msg, "%s");
		$len = count(\Report\Data::get());

		for($i = 0; $i < $num - $len; $i++){
			\Report\Data::add();
		}


		$return = vsprintf($msg, \Report\Data::get());
		\Report\Data::clear();
		return $return;

	}


	public static function get(){
		if(!isset($GLOBALS["report"])) return [];
		return $GLOBALS["report"];
	}

}
