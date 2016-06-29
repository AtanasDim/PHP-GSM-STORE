 <?php include "inc_files/before_content.code"; ?>
 <div id="content">
<?php
if ((!isset($_SESSION["username"])) || ($_SESSION["usertype"]!=1))
{
	echo "<span style='background:red; color:white; font-size:28px'>Нямате права!</span></div></body></html>";
	exit;
}

$errMsg="";
if (empty($_POST["price"]))
	$errMsg .="Не е въведена цена!<br>";
else
	if (!is_numeric($_POST["price"])) $errMsg .="Некоректно въведена цена!<br>";
if ($errMsg) 
{
	echo "<span style='color:green'>".$errMsg."</span><br>";
	echo "<a href='edit_gsm.php?edit_id=".$_POST["id_gsm"]."'> Корекция на данните</a>";
}
else
{
	$mysqli = new mysqli('localhost', 'root', '', $dbName); 
	$mysqli->set_charset('utf8'); 

	$str_query="update mobile_p set price=".$_POST["price"].", moreinfo='".$_POST["moreinfo"]."', design='".$_POST["design"]."', display='".$_POST["display"]."', battery='".$_POST["battery"]."', hardware='".$_POST["hardware"]."', camera='".$_POST["camera"]."', number=".$_POST["number"]." where id_gsm=".$_POST["id_gsm"];
	$mysqli->query($str_query);
	echo "Данните са обновени...<br>";

	$mysqli->close();
}
?>
 </div>
 <?php include "inc_files/after_content.code"; ?>
