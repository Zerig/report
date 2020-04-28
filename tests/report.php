<code style="white-space: pre;">
<?php
require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload
?>

<div style="display:flex;justify-content:space-around">
<div>
<?php
echo "<h2>CONSOLE \ REPORT</h2>";
echo "<hr>";

\Console\Report::form([
	"state" => "success",
	"loc"   => __FILE__,
	"text"  => "Uživatel byl úspěšně přihlášen",
	"data"  => []
]);

echo "<br>---------------------------------------------<br><br>";

?>

</div>









<div>
<?php
echo "<h2>REPORT</h2>";
echo "<hr>";
foreach(\Console\Report::getForm() as $report_data){
	//echo $log_data->file.' on line '.$log_data->line."\n";
	echo "[".$report_data->state."]	".$report_data->text."\n";
	echo "<br>---------------------------------------<br><br>";
}


?>
</div>







</div>
