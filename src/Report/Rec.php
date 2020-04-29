<?php
namespace Report;

class Rec{
	public $depth;
	public $data = [];
	public $success;


	public function start($success = null){
		$this->depth 	= self::getDepth();
		$this->success 	= (is_array($success))? new rData($success) : $success;
	}

	public function end(){
		$array = [];

		for($i = $this->depth; $i < self::getDepth(); $i++){
			$array[] = $GLOBALS["rreport"][$i];
		}
		$this->data = $array;
	}


	public function get($i = null){
		$data = (self::_isStatic())? $GLOBALS["rreport"] : $this->data;
		$last_i = self::getDepth();

		if(is_null($i)) return $data;
		if($i >= 0) 	return (isset($data[$i]))? 				$data[$i] : null;
		if($i < 0) 		return (isset($data[$last_i + $i]))?	$data[$last_i + $i] : null;
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





	public static function add($rData){
		$GLOBALS["rreport"][] = $rData;
	}
	public static function getDepth(){
		return (isset($GLOBALS["rreport"]))?	count($GLOBALS["rreport"]) : 0;
	}
	public static function exist($i = null){
		return isset( $GLOBALS["rreport"][$i] );
	}





	// This method needs to be declared static because it may be called
    // in static context.
    private static function _isStatic() {
        $backtrace = debug_backtrace();

        // The 0th call is to _isStatic(), so we need to check the next
        // call down the stack.
        return $backtrace[1]['type'] == '::';
    }


}
