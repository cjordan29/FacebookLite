<?php
session_start();
// check if a file was submitted
if(!isset($_FILES['userfile'])) {
	echo '<p>Please select a file</p>';
}
else
{
	try {
		$imgData =addslashes(file_get_contents($_FILES['userfile']["tmp_name"]));
		$id=$_SESSION["id"];
		$con = mysql_connect("mysql","cjordan","phapaigo");
		if (!$con)
		{
			die('Could not connect: ' . mysql_error());
		}
		mysql_select_db("cos264s09", $con);
		$query="UPDATE Accounts SET Picture='$imgData' WHERE id=$id;";
		mysql_query($query);
		// some code

		mysql_close($con);
	}
	catch(Exception $e) {
		echo $e->getMessage();
		echo 'Sorry, could not upload file';
	}
}
header("Location:index.php");
?>
