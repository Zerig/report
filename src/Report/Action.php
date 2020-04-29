<?php
namespace Report;

class Action{
	public $depth;
	public $data = [];
	public $success;


	public static function set($group, $state, $type = 0, $num = 0){
		$conf = \Noodlehaus\Config::load(__DIR__ . '\report.json');
		$text = $conf->all();

		$msg = $text[$group][$state][$type];

		$GLOBALS["rreport"][] = new \Report\rData([
			"group"  => $group,
			"state" => $state,
			"msg"   => $msg,
			"type"  => $type,
			"num"   => $num
		]);
		return;
	}




	// --------------------------------------------




	public function start($success = null){
		$this->depth 	= Data::getDepth();
		$this->success 	= (is_array($success))? new rData($success) : $success;
	}

	public function end(){
		$array = [];

		for($i = $this->depth; $i < Data::getDepth(); $i++){
			$array[] = Data::get($i);
		}
		$this->data = $array;
	}


	public function get($i = null){
		$last_i = count(Data::getDepth());

		if(is_null($i)) return $this->data;
		if($i >= 0) 	return (isset($this->data[$i]))? 			$this->data[$i] : null;
		if($i < 0) 		return (isset($this->data[$last_i + $i]))?	$this->data[$last_i + $i] : null;
	}






	public function getHtml(){
		return self::toHtml(self::get());
	}


	public function msg(){
		$fails = [];
		foreach($this->data as $d){
			if($d->state == "fail") $fails[] = $d;
		}

		$array_data = (empty($fails))? [$this->success] : $fails;
		$array_data = array_filter($array_data);	// remove all empty items

		return $array_data;
	}


	public function msgHtml(){
		$fails = [];
		foreach($this->data as $d){
			if($d->state == "fail") $fails[] = $d;
		}

		$array_data = (empty($fails))? [$this->success] : $fails;
		$array_data = array_filter($array_data);	// remove all empty items

		return self::toHtml($array_data);
	}



	public static function toHtml($array_data){
		$string_data = "";
		foreach($array_data as $data){
			$string_data .= "[".$data->state."] ".$data->msg."\n";
		}
		return $string_data;
	}


}
