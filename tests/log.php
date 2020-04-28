<code style="white-space: pre;">
<?php
require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload
?>

<div style="display:flex;justify-content:space-around">
<div>
<?php
echo "<h2>CONSOLE \ LOG</h2>";
echo "<hr>";

echo '<b>$log_data = \Console\Log::mysql("SELECT * FROM table")</b>'."\n";
$log_data = \Console\Log::mysql("
							SELECT *
							FROM table

							WHERE id='5'");
echo '$log_data->file => '.$log_data->file."\n";
echo '$log_data->line => '.$log_data->line."\n";
echo '$log_data->sql  =>'."\n<i>".$log_data->sql."</i>\n";


echo "\n";

echo '<b>$log_data = \Console\Log::mysql("INSERT INTO table (id) VALUES(5)")</b>'."\n";
$log_data = \Console\Log::mysql("
	INSERT INTO table
	(id)
	VALUES (5)
");
echo '$log_data->file => '.$log_data->file."\n";
echo '$log_data->line => '.$log_data->line."\n";
echo '$log_data->sql  =>'."\n<i>".$log_data->sql."</i>\n";
echo "\n";
echo '<b>\Console\Log::getMysql()</b> => ['."\n";
$i = 0;
foreach(\Console\Log::getMysql() as $data){
	$first = true;
	foreach(explode("\n", $data->sql) as $line){

		if($first){
			echo "\n";
			echo '	['.$i.'] =>	'."\n";
			echo '	<i>'.$line."</i>\n";
			$first = false;
		}else{
			echo '	<i>'.$line."</i>\n";
		}
	}
	$i++;
}
echo ']'."\n";
echo dirname($_SERVER['SCRIPT_FILENAME']);

echo "<br>---------------------------------------------<br><br>";

?>

</div>
</div>
