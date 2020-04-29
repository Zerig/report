<?php
namespace Report;

class Mysql extends Action{




	




	public static function set($mysql, $sql){
		$errno 			= $mysql->errno;
		$affected_rows 	= $mysql->affected_rows;
		$state 			= self::getState($affected_rows);
		$query_type 	= self::getQueryType($sql);

		$msg = self::setMsg($errno, $state, $query_type);

		//$errno = ($errno == 0)? self::getQueryType($sql) : $errno;




		$GLOBALS["report"][] = new rData([
			"state" => $state,
			"errno" => $errno,
			"rows"  => $affected_rows,
			"msg"   => $msg
		]);
		return;

	}

	private function getQueryType($sql){
		if(strpos($sql, 'INSERT') !== false) return "insert";
		if(strpos($sql, 'UPDATE') !== false) return "update";
		if(strpos($sql, 'DELETE') !== false) return "delete";
		if(strpos($sql, 'SELECT') !== false) return "select";

		return "0";
	}


	private function getState($i){
		if($i < 0)  return "fail";
		if($i == 0) return "info";
		if($i > 0)  return "success";
	}


	private function setMsg($errno, $state, $query_type){
		// LOAD JSON DATA
		$conf = \Noodlehaus\Config::load(__DIR__ . '\report.json');
		$text = $conf->all();

		if($errno == 0)		$msg = (isset($text["mysql"][$state][$query_type]))? $text["mysql"][$state][$query_type] : $text["mysql"][$state][0];
		if($errno != 0)		$msg = (isset($text["mysql"][$state][$errno]))? 	 $text["mysql"][$state][$errno] 	 : $text["mysql"][$state][0];



		// CHOOSE teh BEST JSON MSG
		//$msg = (isset($text["mysql"][$state][$errno]))? $text["mysql"][$state][$errno] : $text["mysql"][$state][0];
		$num = substr_count($msg, "%s");
		$len = count(\Report\Data::get());

		for($i = 0; $i < $num - $len; $i++){
			//\Report\Data::add("");
		}



		$return = vsprintf($msg, \Report\Data::get());
		\Report\Data::clear();
		return $return;

	}







}
