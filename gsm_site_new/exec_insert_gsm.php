 <?php include "inc_files/before_content.code"; ?>
 <div id="content">
<?php
if ((!isset($_SESSION["username"])) || ($_SESSION["usertype"]!=1))
{?>
 <script>
  document.body.bgColor="black";
  document.body.text="yellow";
  document.write("<h1>Не може...</h1>");
  document.body.style.cursor="wait";
 </script>
 </div></body></html>
<?php
 exit;
}

$errMsg="";
if ($_POST["id_models"]==0) $errMsg .="Не е избрана марка!<br>";
if (empty($_POST["price"]))
	$errMsg .="Не е въведена цена!<br>";
else
	if (!is_numeric($_POST["price"])) $errMsg .="Некоректно въведена цена!<br>";
if ($errMsg) 
{
	echo "<span style='color:green'>".$errMsg."</span><br>";
	echo "<a href='insert_gsm.php'>Ново въвеждане</a>";
}
else
{
	$mysqli = new mysqli('localhost', 'root', '', $dbName); 
	$mysqli->set_charset('utf8'); 

	$str_query="INSERT INTO mobile_p(id_models, price, design, display, battery, hardware, camera ) VALUES ('".$_POST["id_models"]."','".$_POST["price"]."','".$_POST["design"]."','".$_POST["display"]."','".$_POST["battery"]."','".$_POST["hardware"]."','".$_POST["camera"]."')";
	
	$mysqli->query($str_query);
	echo "Данните са записани в базата...<br>";

	$fileErr=$_FILES["imgFile"]["error"]>0;
	if ($fileErr)
	  {
		echo "Не е заредена снимка.<br>";
	  }
	else
	  {
		$allowedExt = array("gif", "jpeg", "jpg", "png");
		$arrName = explode(".", $_FILES["imgFile"]["name"]);
		$ext = end($arrName);
		if (in_array($ext, $allowedExt) && ($_FILES["imgFile"]["size"] < 200000))
		{
			$idGsm=$mysqli->insert_id;
			$picName="Pic".$idGsm.".".$ext;
			move_uploaded_file($_FILES["imgFile"]["tmp_name"], "pictures/".$picName);
			$str_query="update mobile_p set picture='".$picName."' where id_gsm=".$idGsm;
			$mysqli->query($str_query);
			echo "Снимката е качена...<br>";
		}
		else
		{
			echo "Невалиден Image-файл!<br>";
		}
	  }

	$mysqli->close();
}
?>
 </div>
 <?php include "inc_files/after_content.code"; ?>
