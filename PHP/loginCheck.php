<?PHP
   session_start();

   $uname = $_POST['username'];
   $psw = $_POST['password'];

   $servername='localhost:3307';
   $username='root';
   $password='';
   $dbname='agora';

   $db_handle = @mysql_connect($servername,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
   @mysql_select_db($dbname);

   $query = 'SELECT username, password FROM user WHERE username LIKE \'' . $uname . '\' AND password LIKE \'' . $psw . '\';';
   $result = mysql_query($query);

   if($result) {
       //print "Logged In";
       $_SESSION['username']=$uname;
       $_SESSION['password']=$psw;
       header('Location: home.php');
   }
   else {
      print "Wrong username or password";
      mysql_close($db_handle);
   }


?>
