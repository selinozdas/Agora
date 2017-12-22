<?PHP
include ("connection.php");
session_start();

   $query = 'SELECT ID FROM post;';
   $result = mysqli_query($con, $query);

   $randArr=array();

   if (!empty($result)){
      while($row = mysqli_fetch_array($result)) {
         if($row) {
            $var = rand(0,500);
            array_push($randArr, $var);
            $query2 = 'UPDATE post SET rating='.$var.' WHERE ID='.$row['ID'].';';
            $result2 = mysqli_query($con, $query2);
         }
      }
   }

   for($x = 0; $x < count($randArr); $x++) {
    echo $randArr[$x];
    echo "<br>";
}
?>
