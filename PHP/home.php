<?PHP
   session_start();
?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link type='text/css' rel='stylesheet' href='login_stylesheet.css'>
</head>
<body>
   <?PHP if (isset($_SESSION['username'])){?>
   <h3>Hello, <?PHP echo $_SESSION['username'];?> </h3>
   <?PHP } else {?>
   <h3>Home!</h3>
   <?PHP }?>
   <form id="logout_form" action="logout.php" method="post">
	     <input type="Submit" value="Log Out" name="logoutbtn">
   </form>
</body>
</html>
