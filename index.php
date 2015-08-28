<?php
session_start();
if (!isset($_SESSION['id'])){
	header('Location:login.php');
}
?>
<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

  <head>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<style type="text/css">
	body {background-color: #0099FF}
	</style>
	<title>Facebook Lite</title>
	</script>
  </head>
  <body>
  <div id="container">
  <a href="logout.php" style="float:right">logout</a>
  <h1 align="center">Facebook Lite</h1>
  <h2 align="center">The new place to exploit your friends face</h2>
  <hr/>
	<div style="float:right">
	<p>Friends List</p>
  <table>

  <?php
	$id=$_SESSION["id"];
	$con = mysql_connect("mysql","cjordan","phapaigo");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("cos264s09", $con);
	$Search=$_REQUEST["search"];
	$query="SELECT Accounts.ScreenName, Accounts.id 
		    FROM Accounts, Friends 
			WHERE 
			Accounts.id=Friends.Second
			AND Friends.First=$id OR
			Accounts.id=Friends.First
			AND Friends.Second=$id;";
	$result=mysql_query($query);
	if (!$result) {
		print "Error - the query could not be executed ";
		$error = mysql_error();
		print "<php>" . $error . "</p>";
		exit;
	}
	if (mysql_num_rows($result)==0){
		print "<tr><td> No Results Found </td></tr>";
	}
	while($row=mysql_fetch_assoc($result)){
		echo '<tr><td>';
		echo $row['ScreenName'];
		echo  '</td>';
		echo '<td> <form action="removefriend.php">
			<input type="hidden" name="otherid" value="'.$row["id"].'"/>
			<input type="submit" name="submit" id="submit" value="remove"/>
			</form></td>';
		echo '</td></tr>';
	}
	mysql_close($con);
?>
  	</table>
	</div>
	<p><?php echo $_SESSION["screenname"];?></p>
  <form action="processStatusUpdate.php">
		<p>Status</p>
		<input type="text" id="status" name="status" value="<?php echo $_SESSION["status"];?>"/>
		<input type="submit" name="submit" id="submit" value="Update"/>  
  </form>
   <img width="200" height="100" src="get_pic.php"/><br/>
  <form enctype="multipart/form-data" action="upload.php" method="post">
  <p>Set Picture</p>
   <input name="userfile" type="file" />
   <input type="submit" value="Update" />
  </form>
  <form action="index.php">
		<p>Search</p>
		<input type="text" id="search" name="search"/>
		<input type="submit" name="submit" id="submit" value="Search"/>  
  </form>
  <table>
  <?php
if (isset($_REQUEST["search"])){
	$id=$_SESSION["id"];
	$con = mysql_connect("mysql","cjordan","phapaigo");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("cos264s09", $con);
	$Search=$_REQUEST["search"];
	$query="SELECT Picture, ScreenName,id FROM Accounts WHERE ScreenName LIKE '%$Search%';";
	$result=mysql_query($query);
	if (!$result) {
		print "Error - the query could not be executed ";
		$error = mysql_error();
		print "<php>" . $error . "</p>";
		exit;
	}
	if (mysql_num_rows($result)==0){
		print "<tr><td> No Results Found </td></tr>";
	}
	while($row=mysql_fetch_assoc($result)){
		echo '<tr><td>';
		echo $row['ScreenName'];
		echo  '</td>';
		echo '<td> <form action="addfriend.php">
			<input type="hidden" name="otherid" value="'.$row["id"].'"/>
			<input type="submit" name="submit" id="submit" value="add"/>
			</form></td>';
		echo '</td></tr>';
	}
	mysql_close($con);
}
?>
  	</table>
  </div>
</body>
</html>
