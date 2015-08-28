<?php
session_start();
$id=$_SESSION["id"];
$status=$_REQUEST["status"];
$con = mysql_connect("mysql","cjordan","phapaigo");
if (!$con)
{
	die('Could not connect: ' . mysql_error());
}
mysql_select_db("cos264s09", $con);
$query="UPDATE Accounts SET Status='$status' WHERE id=$id;";
mysql_query($query);
header("Location:index.php");
// some code

mysql_close($con);
?>


