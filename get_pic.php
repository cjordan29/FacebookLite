<?php
session_start();
$id=$_SESSION["id"];
$con = mysql_connect("mysql","cjordan","phapaigo");
if (!$con)
{
	die('Could not connect: ' . mysql_error());
}
mysql_select_db("cos264s09", $con);
$query="SELECT Picture FROM Accounts WHERE id=$id;";
$result=mysql_query($query);
if (!$result) {
	print "Error - the query could not be executed ";
	$error = mysql_error();
	print "<php>" . $error . "</p>";
	exit;
}
mysql_close($con);
header("Content-type: image/jpeg");
$im=imagecreatefromstring(mysql_result($result, 0));
imagejpeg($im);
?>
