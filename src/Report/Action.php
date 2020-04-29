<?php
namespace Report;

class Action{
	public $depth;
	public $data = [];
	public $success;


	public static function set($group, $state, $data = [], $type = 0, $num = 0){
		$conf = \Noodlehaus\Config::load(__DIR__ . '\report.json');
		$text = $conf->all();

		if(!isset($data[0])) $data[] = "";
		if(!isset($data[1])) $data[] = "";
		if(!isset($data[2])) $data[] = "";

		$msg = str_replace(
			["%g", "%s", "%0", "%1", "%2", "%t", "%n"],
			[$group, $state, $data[0], $data[1], $data[2], $type, $num],
			$text[$group][$state][$type]
		);

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
