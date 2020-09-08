<?php
$link = mysqli_connect('localhost','root', '', 'passlog');

/* check connection */
if (mysqli_connect_error()) 
{
    printf("ERROR CONNECT: %s\n", mysqli_connect_error());
    exit();
}


if($_GET["login"] && $_GET["pass"])
{
    $login=$_GET["login"];
    $pass=$_GET["pass"]; 
    $sql = "SELECT * FROM `logpass_table` WHERE `login`='%s' AND `pasword`='%s'";
	$query = sprintf($sql,
            mysqli_real_escape_string($link,$login),
            mysqli_real_escape_string($link,$pass));
    echo $query."<br/>";
	$result = mysqli_query($link,$query); 
	if(mysqli_num_rows($result))
		echo "TRUE";
    else 
		echo "FALSE";
}
?>


<body>
	<form action="" method="get">
		Логин:<input type="text" name="login" value="<?=$_GET["login"]?>"/>
		Пароль:<input type="text" name="pass" value="<?=$_GET["pass"]?>"/>
		<input type="submit" value="submit"/>
	</form>
</body>
