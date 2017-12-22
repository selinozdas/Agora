<?PHP
   include ("connection.php");
   session_start();

   if (isset($_GET['ID'])){

      $ID = $_GET['ID'];

      $query = 'SELECT name FROM channel WHERE ID LIKE \'' . $ID . '\';';
      $result = mysqli_query($con, $query);

      $row = mysqli_fetch_array($result);
      if($row) {
         $channelTitle = $row['name'];
      }

      $query = 'SELECT * FROM post WHERE channelID LIKE \'' . $ID . '\';';
      $result = mysqli_query($con, $query);

      //print $query.'<br>';

   }
   else {
      echo "need to choose a post to show";
   }
?>

<!DOCTYPE html>
<html>
   <head>
   	<title><?PHP echo $channelTitle;?></title>
   </head>
   <body>
      <h2>List of Posts in <?PHP echo $channelTitle;?></h2>
      <div class='container'>
         <?PHP if (!empty($result)){
            while($row = mysqli_fetch_array($result)) {
               if($row) {
                  $link='post.php?ID='.$row['ID'];
                  $outRow = '<div class=\'postContainer\'>';
                  $outRow.='<a class=\'postTitle\' href='.$link.'>'.$row['title'].'</a>';
                  $outRow.='<div class=\'littleDataCont\'><span class=\'dataTitle\'>up/down votes: </span>';
                  $outRow.='<span class=\'upDownCont\'>'.$row['rating'].'</span>';
                  $outRow.='<br><span class=\'dataTitle\'>time posted: </span>';
                  $outRow.='<span class=\'timeCont\'>'.$row['time_posted'].'</span></div>';
                  $outRow.='<br><span class=\'postContMini\'>'.$row['body'].'</span><br><br>';
                  $outRow.='</div>';
                  echo $outRow;
               }
            }
         }?>
      </div>
   </body>
</html>
<script>

</script>
<style>
body{
   background-color: lightgrey;
}
   a{
      font-size: 20px;
      color: darkblue;
      margin-left: 30px;
   }
   a:hover{
      color: black;
   }

   #littleDataCont{
      position: absolute;
      height: : 50px;
      padding-left: 100px;
      color: green;
   }
   #container{
      position: relative;

   }
   #postContMini{
      background-color: lightblue;
      margin-left: 60px;
      color: rgba(0,0,0,0.7);
      overflow: hidden;
      text-overflow: ellipsis; 
      //margin-left: 30px;
   }
</style>
