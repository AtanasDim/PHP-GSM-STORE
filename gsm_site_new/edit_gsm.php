 <?php include "inc_files/before_content.code"; ?>
 <div id="content">
<?php
$mysqli = new mysqli('localhost', 'root', '', $dbName); 
$mysqli->set_charset('utf8'); 

$result = $mysqli->query("SELECT mobile_p.*, g_models.make_gsm FROM mobile_p join g_models on mobile_p.id_models=g_models.id_models where id_gsm=".$_REQUEST['edit_id']);
$row = $result->fetch_assoc();

echo "<form action='exec_edit_gsm.php' method='post'>";
echo "<input type='hidden' value='".$_REQUEST['edit_id']."' name='id_gsm'>";
echo "<table border='1' align='center'>";
echo "<tr valign='top'>";
echo "<td width='33%'> марка: <b>".htmlspecialchars(stripslashes($row['make_gsm'])) . "</b>
<br>  цена: <b><input type='text' value='".htmlspecialchars(stripslashes($row['price'])). "' name='price'></b> лв.
<br> брой: <b><input type='text' value='".htmlspecialchars(stripslashes($row['number'])). "' name='number'></b> бр.

<br> Дизайн: <b><input type='text' value='".htmlspecialchars(stripslashes($row['design'])). "' name='design'></b> 
<br> Дисплей: <b><input type='text' value='".htmlspecialchars(stripslashes($row['display'])). "' name='display'></b> 
<br> Батерия: <b><input type='text' value='".htmlspecialchars(stripslashes($row['battery'])). "' name='battery'></b> 
<br> Хардуер: <b><input type='text' value='".htmlspecialchars(stripslashes($row['hardware'])). "' name='hardware'></b> 
<br> Камера: <b><input type='text' value='".htmlspecialchars(stripslashes($row['camera'])). "' name='camera'></b> 

 
<br> <hr><textarea rows='10' cols='30' name='moreinfo'>".htmlspecialchars(stripslashes($row['moreinfo']))."</textarea><br><input type='submit' value='Запис'></td><td>".($row['picture']?"<img src='pictures/".$row['picture']."'>":"Няма снимка...")."</td>";
echo "</tr>";
echo "</table>";

echo "</form>";

$mysqli->close();
?>
 </div>
 <?php include "inc_files/after_content.code"; ?>