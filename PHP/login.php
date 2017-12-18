<?PHP
   session_start();
/*
   if (isset($_SESSION['username'])){
      echo "username: ", $_SESSION['username'];

   }
   else {
      echo "no username";
   }
*/
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link type='text/css' rel='stylesheet' href='login_stylesheet.css'>
</head>
<body>
	<form id = "login" action="loginCheck.php" method="post">
 		 <div class="container">
			 <div class="warning">
				 <label id='warning_text'></label>
			 </div>
			 <div class="login_data">
			 	<div class="login_data_row">
			 		<label class = "input_label">Username</label>
    				<input class = "input_text_box" type="text" placeholder="Enter Username" name="username" required>
				</div>
				<div class="login_data">
    				<label class = "input_label">Password</label>
    				<input class = "input_text_box" type="password" placeholder="Enter Password" name="password" required>
				</div>
			</div>
    			<button id="submit_btn" type="submit">Login</button>
  		</div>
</form>
</body>
</html>
