<?PHP
   include ("connection.php");
   session_start();

   $uname = $_POST['username'];
   $psw = $_POST['password'];

   $query = 'SELECT ID, username, password FROM user WHERE username LIKE \'' . $uname . '\' AND password LIKE \'' . $psw . '\';';
   $result = mysqli_query($con , $query);

   while($row = mysqli_fetch_array($result)) {
      //echo $row['username'];
      if($row) {
          print "Logged In";
          $_SESSION['username']=$uname;
          $_SESSION['password']=$psw;
          $_SESSION['ID']=$row['ID'];
          header('Location: home.php');
      }
   }

   print "Wrong username or password";
   mysqli_close($con);


?>
