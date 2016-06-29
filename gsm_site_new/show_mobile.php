<?php include "inc_files/before_content.code"; ?>
<div id="content">
<?php

$mysqli = new mysqli('localhost', 'root', '', $dbName);
$mysqli->set_charset('utf8');
$result = $mysqli->query("SELECT mobile_p.*, g_models.make_gsm FROM mobile_p join g_models on mobile_p.id_models=g_models.id_models where id_gsm=".$_REQUEST['show_id']);
$row = $result->fetch_assoc();
echo "<table border='1' align='center' height='500' width='800'>";
echo "<tr valign='top'>";
echo "<td width='250'>
 марка: <b>".htmlspecialchars(stripslashes($row['make_gsm'])) . "</b>
 <br>цена: <b>".htmlspecialchars(stripslashes($row['price'])). "</b> лв.
 <br>брой: <b>".htmlspecialchars(stripslashes($row['number'])). "</b>бр.
 
 <br>Дизайн: <b>".htmlspecialchars(stripslashes($row['design'])). "</b>
 <br>Дисплей: <b>".htmlspecialchars(stripslashes($row['display'])). "</b>
 <br>Батерия: <b>".htmlspecialchars(stripslashes($row['battery'])). "</b>
 <br>Хардуер: <b>".htmlspecialchars(stripslashes($row['hardware'])). "</b>
 <br>Камера: <b>".htmlspecialchars(stripslashes($row['camera'])). "</b>
 
 <br><hr><span style=font-size:16px'><pre>".htmlspecialchars(stripslashes($row['moreinfo']))."</pre></span></td>
 <td>".($row['picture']?"<img src='pictures/".$row['picture']."'>":"Няма снимка...")."</td>";
echo "</tr>";
echo "</table>";
echo "<a href='javascript:history.back()' title='Връщане към предходната страница'>Обратно към списъка</a>";
$mysqli->close();
?>
</div>
<?php include "inc_files/after_content.code"; ?>

