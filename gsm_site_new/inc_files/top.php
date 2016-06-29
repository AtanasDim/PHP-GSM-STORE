<div id="top" align="left"><h1 align="center">Мобилни телефони</h1>
<?php
if (!isset($_SESSION["username"]))
{?>
<form action="login.php" method="post">
Потребител: <input type="text" name="username"
value="admin"> Парола: <input type="password" name="password" value="admin">
<input type="submit" 
value="Вход">&nbsp;
</form>

<?php }
else echo $_SESSION["personname"] . "<a href='logout.php'>Изход</a>&nbsp;";
?>
</div>