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

		\Report\Rec::add(new \Report\rData([
			"group"  => $group,
			"state" => $state,
			"msg"   => $msg,
			"type"  => $type,
			"num"   => $num
		]));
		return;
	}




}
