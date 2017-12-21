<?php 

   $host = "localhost";
   $user = "root";
   $password = "";
   $db = "agora";
   
   $_SESSION['success'] = "";
   //connecting to database
   $con = mysqli_connect($host , $user , $password , $db) or die("Go fuck yourself");
   	session_start();
	
    echo "Connection established";

?>