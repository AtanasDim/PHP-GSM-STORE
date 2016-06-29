<?php include "inc_files/before_content.code"; ?>
<script type="text/javascript">
function removeGsm(num)
{
	if (confirm("Изтриване на данни за телефон!?"))
	self.location.href="exec_delete_gsm.php?del_id="+num;
}
</script>
 <div id="content">
 <?php
 $idMake_gsm=0; $prc=""; $insertText=""; $addWord=" where "; $addWordEnd="make_gsm";
 if(isset($_GET["id_models"]))
 {
	$idMake_gsm=$_GET['id_models']; $prc=$_GET['price'];
	if($_GET['id_models']!=0)
		{$insertText .=$addWord."mobile_p.id_models=".$_GET["id_models"]; $addWord=" and "; $addWordEnd="price";}
	if (!empty($_GET['price']))
		if (is_numeric($_GET['price']))
			{$insertText .=$addWord."price<=".$_GET['price']; $addWordEnd="price";}
		else $prc=$_GET['price']="";
 }
 
 $mysqli = new mysqli('localhost', 'root', '', $dbName);
 $mysqli->set_charset('utf8');
 
 $result = $mysqli->query("SELECT * FROM g_models order by 	make_gsm");
 
 echo "<form action='".$_SERVER['PHP_SELF']."' method='get'>";
 echo "<p align='center'>";
 echo "Марка: <select name='id_models'>";
 echo "<option value='0'>Всички телефони</option>";
 while($row = $result->fetch_assoc())
 {
 echo "<option value='".htmlspecialchars(stripslashes($row['id_models'])) . "'" . (($row['id_models']==$idMake_gsm)?' selected':'').">".htmlspecialchars(stripslashes($row['make_gsm'])). "</option>";
 }
 echo "</select>";
 echo " цена до <input type='text' name='price' value='".$prc."'>лв.";
 echo " <input type='submit' value='Справка'>";
 echo "</p>";
 echo "</form>";

 
 
 $strQuery="SELECT mobile_p.*, g_models.make_gsm FROM mobile_p join g_models on mobile_p.id_models=g_models.id_models".$insertText." order by ".$addWordEnd;

 $result = $mysqli->query($strQuery);

 echo "<table border='13' align='center' width='800'>";
 if (isset($_SESSION["username"]) && $_SESSION["usertype"]==1)
 {
	echo "<tr><th>марка</th><th>цена</th><th>12м. лизинг</th><th colspan='2'>операции</th><th>брой</th><th>купи</th></tr>";
	while($row = $result->fetch_assoc())
	{
	echo "<tr>";
	echo "<td><a href='show_mobile.php?show_id=".$row['id_gsm']."' title='Подробна информация'>".htmlspecialchars(stripslashes($row['make_gsm'])) . " </a></td>
	<td>".htmlspecialchars(stripslashes($row['price'])). "лв.</td>
	<td>".htmlspecialchars(stripslashes (round($row['price']/12, 2))). " лв.</td>
	<td><a href='edit_gsm.php?edit_id=".$row['id_gsm']."' title='Промяна на цената и на допълнителната информация'>редактиране</a></td>
	<td><a href='javascript:removeGsm(".$row['id_gsm'].")'title='Изтриване на данните'>изтриване</a></td>
	<td>".htmlspecialchars(stripslashes($row['number'])). " бр.</td>
	<td><a href=kupi.php?id=".$row['id_gsm']."> купи </a></td>
	</tr>";
	}
 }
 else
 {
	 echo "<table border='8' align='center' width='500'>";
	echo "<tr><th>марка</th><th>цена</th><th>12м. лизинг</th></tr>";
	while($row = $result->fetch_assoc())
	{
	echo "<tr>";
	echo  "<td><a href='show_mobile.php?show_id=".$row['id_gsm']."' title='Подробна информация'>" .htmlspecialchars(stripslashes($row['make_gsm'])) . "</a></td><td>".htmlspecialchars(stripslashes($row['price'])). " лв.</td><td>".htmlspecialchars(stripslashes (round($row['price']/12, 3))). " лв.</td>";
	echo "</tr>";
	}
}

echo "</table>";
$mysqli->close();
?>

</div>
<?php include "inc_files/after_content.code"; ?>	
