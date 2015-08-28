<?php
    session_start();
	$id=$_SESSION["id"];
	$otherid=$_REQUEST["otherid"];
	$con = mysql_connect("mysql","cjordan","phapaigo");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("cos264s09", $con);
	$query="DELETE FROM Friends WHERE
			First=$id AND Second=$otherid OR
			Second=$id AND First=$otherid;";
    mysql_query($query);
	mysql_close($con);
	header("Location: index.php");
?>
