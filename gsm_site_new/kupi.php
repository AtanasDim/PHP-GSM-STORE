<?php
include "inc_files/before_content.code"; 
$con = mysqli_connect('localhost', "root", '', "$dbName");
if (!$con){
die("Can not connect: " . mysqli_error($con));
}
if(isset($_GET['id']) && is_numeric($_GET['id'])){
$select="SELECT * FROM mobile_p WHERE id_gsm='$_GET[id]'";
$selectquery=mysqli_query($con, $select);
$selectnumber=mysqli_fetch_assoc($selectquery);
if($selectnumber['number']<=0)
{
	echo "Изчерпани количества!<br/>";
	echo '<a href="list_models.php">Назад към списъка<<<<</a>';
}
else
{
	$UpdateQuery = "UPDATE mobile_p SET number='".(intval($selectnumber['number'])-1)."' WHERE id_gsm='$_GET[id]'";               
		if(mysqli_query($con, $UpdateQuery))
		{
			echo "Телефона беше закупен успешно!<br/>";
			echo '<a href="list_models.php">Назад към списъка<<<<</a>';
		}
		else
		{
			echo "Опс...Възникна проблем с главния алгоритъм...";
		}
	}
}
mysqli_close($con);

?>
</table>
</div>
<?php include "inc_files/after_content.code"; ?>	
