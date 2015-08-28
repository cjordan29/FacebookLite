<?php
$FormScreenName=$_REQUEST["screenname"];
$FormPassword=$_REQUEST["password"];
$con = mysql_connect("mysql","cjordan","phapaigo");
if (!$con)
{
	die('Could not connect: ' . mysql_error());
}
mysql_select_db("cos264s09", $con);
$query="SELECT * FROM Accounts WHERE ScreenName='$FormScreenName';";
$result=mysql_query($query);
if (!$result) {
	print "Error - the query could not be executed ";
	$error = mysql_error();
	print "<php>" . $error . "</p>";
	exit;
}
if (mysql_num_rows($result) > 0){
	$row = mysql_fetch_array($result);
	if ($FormPassword==$row["Password"]){
		session_start();
		$_SESSION["id"]=$row["id"];
		$_SESSION["screenname"]=$row["ScreenName"];
		$_SESSION["status"]=$row["Status"];
		$_SESSION["picture"]=$row["Picture"];
		header("Location:index.php");
	}else print("incorrect password");	
}else print("screenname unknown");

// some code

mysql_close($con);
header("Location:index.php")
?>


