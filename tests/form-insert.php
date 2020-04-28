<code style="white-space: pre;">
<?php
require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload
require_once '__reset.php';
?>

<div style="display:flex;justify-content:space-around">
<div>
<?php
echo "<h2>REPORT \ FORM \ INSERT</h2>";
echo "<hr>";




\Report\Mysql::set(0, "aaa")








/*




$res = $GLOBALS["mysql"]->insert("man", ["name"=> "Smazat", "age" => "54"]);
echo '$res = $GLOBALS["mysql"]->insert("man", ["name"=> "Smazat", "age" => "54"]) => '.$res."\n";
\Report\Form::insert($res);

echo "\n";


try{
$res = $GLOBALS["mysql"]->insert("man", ["id"=> "1", "age" => "54"]);
echo '$res = $GLOBALS["mysql"]->insert("man", ["id"=> "1", "age" => "54"]) => '.$res."\n";
\Report\Form::insert($res);

}catch(Exception $e){
	echo var_dump($e);
}

echo "<br>---------------------------------------------<br><br>";

?>

</div>









<div>
<?php
echo "<h2>REPORT</h2>";
echo "<hr>";

echo '<table style="width:100%; text-align:left;">';
foreach(\Report\Form::get() as $report_data){
	echo '<tr>';
		echo '<td>['.$report_data->state.']</td>';
		echo '<td>'.$report_data->msg.'</td>';

		//echo "[".$report_data->state."]	".$report_data->msg."\n";
	echo '</tr>';
}
echo '</table>';


?>
</div>




<div>
<?php
echo "<h2>MYSQL LOG</h2>";
echo "<hr>";
foreach(\Console\Log::getMysql() as $log_data){
	//echo $log_data->file.' on line '.$log_data->line."\n";
	echo $log_data->sql."\n";
	echo "<br>---------------------------------------<br><br>";
}


?>
</div>



<div>
<?php
echo "<h2>SELECT * FROM MAN</h2>";
echo "<hr>";
$mr_man = $GLOBALS["mysql"]->query("
	SELECT *
	FROM man
");


echo '<table style="width:100%; text-align:left;">';
echo '<tr>';
	foreach($mr_man->key as $key){
		echo '<th>'.$key.'</th>';
	}
echo '</tr>';
foreach($mr_man->get_objects() as $man){
	echo '<tr>';
		foreach($mr_man->key as $key){
			echo '<td>'.$man->{$key}.'</td>';
		}
	echo '</tr>';
}
echo '</table>';
*/
?>
</div>



</div>
