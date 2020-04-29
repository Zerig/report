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

echo '$my_rec = new \Report\Action()'."\n";
$my_rec = new \Report\Action();

echo "<br>---------------------------------------------<br><br>";

echo '\Report\Action::set("action", "fail")'.\Report\Action::set("action", "fail")."\n";
echo '$my_rec->start()'.$my_rec->start()."\n";
echo '\Report\Action::set("action", "fail")'.\Report\Action::set("action", "fail")."\n";
echo '\Report\Action::set("action", "success")'.\Report\Action::set("action", "success")."\n";
echo '\Report\Action::set("action", "fail")'.\Report\Action::set("action", "fail")."\n";
echo '\Report\Action::set("action", "info")'.\Report\Action::set("action", "info")."\n";
echo "\n";
echo '$my_rec->end()'.$my_rec->end()."\n";
echo '$my_rec->msgHtml() => '."\n".$my_rec->msgHtml()."\n";
echo '$my_rec->getHtml() => '."\n".$my_rec->getHtml()."\n";
echo '$my_rec->msg() => ['."\n";
$i = 0;
foreach($my_rec->msg() as $rec){
	echo '	['.$i.']->msg => '.$rec->msg."\n";
	$i++;
}
echo ']'."\n";
echo '$my_rec->get() => ['."\n";
$i = 0;
foreach($my_rec->get() as $rec){
	echo '	['.$i.']->msg => '.$rec->msg."\n";
	$i++;
}
echo ']'."\n";

echo "<br>---------------------------------------------<br><br>";

echo '$my_rec->start()'.$my_rec->start()."\n";
echo '\Report\Action::set("action", "success")'.\Report\Action::set("action", "success")."\n";
echo '\Report\Action::set("action", "info")'.\Report\Action::set("action", "info")."\n";
echo "\n";
echo '$my_rec->end()'.$my_rec->end()."\n";
echo '$my_rec->msgHtml() => '."\n".$my_rec->msgHtml()."\n";

echo "<br>---------------------------------------------<br><br>";

echo '$my_rec->start([
	"state" => "success",
	"msg"   => "Vše proběhlo úspěšně."
])'.$my_rec->start([
	"state" => "success",
	"msg"   => "Vše proběhlo úspěšně."
])."\n";
echo '\Report\Action::set("action", "success")'.\Report\Action::set("action", "success")."\n";
echo '\Report\Action::set("action", "info")'.\Report\Action::set("action", "info")."\n";
echo "\n";
echo '$my_rec->end()'.$my_rec->end()."\n";
echo '$my_rec->msgHtml() => '."\n".$my_rec->msgHtml()."\n";

echo "<br>---------------------------------------------<br><br>";



?>

</div>









<div>
<?php
echo "<h2>REPORT</h2>";
echo "<hr>";

echo '<table style="width:100%; text-align:left;">';
foreach(\Report\Data::get() as $report_data){
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
</div>



</div>
