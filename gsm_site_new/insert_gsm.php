 <?php include "inc_files/before_content.code"; ?>
 <div id="content">
 <table align="center"><tr><td>
  <form action="exec_insert_gsm.php" method="post" enctype="multipart/form-data">
   <u>Въвеждане на данни за нов модел:</u><br><br>
Марка:   
<?php
$mysqli = new mysqli ('localhost', 'root', '' , $dbName);
$mysqli->set_charset('utf8');

$result = $mysqli->query("SELECT * FROM g_models order by make_gsm");
echo "<select name='id_models'>";
echo "<option value='0'>Изберете...</option>";
while($row = $result->fetch_assoc())
{
echo "<option value='".htmlspecialchars(stripslashes($row['id_models'])) . "'>".htmlspecialchars(stripslashes($row['make_gsm'])). "</option>";
}
echo "</select>";
$mysqli->close();
?>
<br>Цена: <input type="text" name="price" value="">лв.<br>
Подробно описание:<br>
Модел:<br><textarea name="model" rows="2" cols="40"></textarea><br>
Дизайн:<br><textarea name="design" rows="5" cols="40"></textarea><br>
Дисплей:<br><textarea name="display" rows="5" cols="40"></textarea><br>
Батерия:<br><textarea name="battery" rows="2" cols="40"></textarea><br>
Хардуер:<br><textarea name="hardware" rows="5" cols="40"></textarea><br>
Камера:<br><textarea name="camera" rows="5" cols="40"></textarea><br>
Добавяне на снимка: <input type="file" name="imgFile"><br>
<input type="submit" value="Запиши" >
  </form>
 </table>
 </div>
 <?php include "inc_files/after_content.code"; ?>
