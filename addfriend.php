<?php
session_start();
$myid=$_SESSION["id"];
$otherid=$_REQUEST["otherid"];
$con = mysql_connect("mysql","cjordan","phapaigo");
if (!$con)
{
	die('Could not connect: ' . mysql_error());
}
mysql_select_db("cos264s09", $con);
$query="INSERT INTO Friends(First, Second) VALUES($myid, $otherid);";
if($myid < $otherid){
	$query="INSERT INTO Friends(First, Second) VALUES($myid, $otherid);";
}
else 
	$query="INSERT INTO Friends(First, Second) VALUES($otherid, $myid);";

mysql_query($query);

print(mysql_error());
mysql_close($con);
header('Location:index.php')
?>

