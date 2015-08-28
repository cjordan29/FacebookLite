<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

  <head>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<title>Chad's FaceBook Page</title>
  </head>
  <body>
  <div id="container">
  <h1>Login</h1>
  <hr/>
  <form action="processLogin.php">
		<p>Screenname</p>
		<input type="text" id="screenname" name="screenname"/>
		<p>Desired Password</p>
		<input type="password" name="password" id="password"/>
		<input type="submit" name="submit" id="submit" value ="submit"/>
		<br/>
  </form>
  <a href="signup.php">Signup</a>
  </div>
</body>
</html>

