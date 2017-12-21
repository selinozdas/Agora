<?PHP
   include ("connection.php");
   session_start();

   if (isset($_POST['username']) && isset($_POST['password'])&& isset($_POST['firstName'])&& isset($_POST['lastName'])&& isset($_POST['email'])){
      $uname = $_POST['username'];
      $psw = $_POST['password'];
      $firstName = $_POST['firstName'];
      $lastName = $_POST['lastName'];
      $email = $_POST['email'];

      $query = 'INSERT INTO user VALUES( NULL, \'' . $uname . '\', \'' . $psw . '\' , \'' . $email . '\', \'' . $firstName . '\', \'' . $lastName . '\', \'\', \'0\', \'0\', \'0\', \'0\', \'0\');';
      $result = mysqli_query($con, $query);

      $query2 = 'SELECT ID, username, password FROM user WHERE username LIKE \'' . $uname . '\' AND password LIKE \'' . $psw . '\';';
      $result2 = mysqli_query($con , $query2);

      while($row = mysqli_fetch_array($result2)) {
         //echo $row['username'];
         if($row) {
             print "Logged In";
             $_SESSION['username']=$uname;
             $_SESSION['password']=$psw;
             $_SESSION['id']=$row['ID'];
             header('Location: home.php');
         }
      }
      header('Location: home.php');
   }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
</head>
<body>
	<form id = "signup" action="signup.php" method="post">
 		 <div class="container">
			 <div class="signup_data">
			 	<div class="signup_data_row">
               <label class = "input_label">First Name</label>
               <input class = "input_text_box" type="text" placeholder="Enter First Name" name="firstName" required>
               <br>
               <label class = "input_label">Last Name</label>
    				<input class = "input_text_box" type="text" placeholder="Enter Last Name" name="lastName" required>
               <br>
               <label class = "input_label">E-mail</label>
    				<input class = "input_text_box" type="email" placeholder="Enter E-mail" name="email" required>
               <br>
               <label class = "input_label">Username</label>
    				<input class = "input_text_box" type="text" placeholder="Enter Username" name="username" required>
				</div>
				<div class="signup_data">
    				<label class = "input_label">Password</label>
    				<input class = "input_text_box" type="password" placeholder="Enter Password" name="password" required>
				</div>
			</div>
    			<button id="submit_btn" type="submit">Sign Up</button>
            <button id="cancel_btn" type="button">Cancel</button>
      </div>

</form>
</body>
</html>
<script type="text/javascript">
    document.getElementById("cancel_btn").onclick = function () {
        location.href = "login.php";
    };
</script>
