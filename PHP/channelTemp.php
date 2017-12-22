<?PHP
   include ("connection.php");
   session_start();

   $query = 'SELECT ID, name FROM channel;';
   $result = mysqli_query($con, $query);

?>


<!DOCTYPE html>
<html>
   <head>
   	<title>Channel Choose</title>
   </head>
   <body>
      <h2>List of Channels!</h2>
      <ul>
         <?PHP if (!empty($result)){
            while($row = mysqli_fetch_array($result)) {
               if($row) {
                  $link='channel.php?ID='.$row['ID'];
                  $outRow = "<li><a class=\"channelItem\" href=".$link.">".$row['name']."</a></li>";
                  echo $outRow;
               }
            }
         }?>
      </table>
   </body>
</html>
