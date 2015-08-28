<?php
$screenName=$_REQUEST["screenname"];
$password=$_REQUEST["password"];
$con = mysql_connect("mysql","cjordan","phapaigo");
if (!$con)
{
	die('Could not connect: ' . mysql_error());
}
mysql_select_db("cos264s09", $con);
$query="INSERT INTO Accounts(ScreenName,Password) VALUES('$screenname', '$password');";
mysql_query($query);

// some code

mysql_close($con);
header("Location:login.php");
?>


