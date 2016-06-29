<?php session_start(); $dbName="gsm_1088-1"; ?>

<?php
$mysqli = new mysqli('localhost', 'root', '', $dbName);
$mysqli->set_charset('utf8');

$result = $mysqli->query("SELECT * FROM g_users where username='". $_POST["username"] . "' and password='" . $_POST["password"] . "'");

$mysqli->close();

if ($row = $result->fetch_assoc())
{
	$_SESSION["username"]=htmlspecialchars(stripslashes($row["username"]));
	$_SESSION["usertype"]=htmlspecialchars(stripslashes($row["usertype"]));
	$_SESSION["personname"]=htmlspecialchars(stripslashes($row["personname"]));
}
else $_SESSION["error"]="Невалидно потребителско име и/или грешна парола!";

header("Location: .");
exit;

?>	