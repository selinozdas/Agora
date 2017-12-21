<?PHP
   include ("connection.php");
   session_start();

   $ID = $_GET['ID'];

   $query = ';';
   $result = mysqli_query($con, $query);
?>
