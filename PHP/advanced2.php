<?PHP
include ("connection.php");
session_start();
$userID = '2000000003';

/*
CREATE VIEW show_suscribed_channels AS
SELECT postID, rating FROM (SELECT channelID
                    FROM subscribes
                    WHERE userID = '1000000000' NATURAL JOIN
                    SELECT ID AS postID, channelID, rating FROM post) AS T
ORDER by rating DESC;

CREATE VIEW show_popular posts AS
(SELECT postID, rating FROM (SELECT channelID
                    FROM subscribes
                    NATURAL JOIN
            		SELECT ID AS postID, channelID, rating FROM post) AS T
WHERE userID = '1000000000'
ORDER by rating DESC;


SELECT ID, rating
FROM
    (SELECT channelID FROM subscribes WHERE userID = '1000000000') AS T1
    JOIN
    (SELECT ID, rating, channelID FROM post) AS T2
    ON T1.channelID = T2.channelID
ORDER by rating DESC;
*/


$query = "SELECT firstName FROM user WHERE ID = '".$userID."';";
$result = mysqli_query($con, $query);
//echo $query;
$row = mysqli_fetch_array($result);

$userName = $row['firstName'];

$query = "SELECT channelID FROM subscribes WHERE userID = '1000000000';";
$result = mysqli_query($con, $query);

$output = "";
if (!empty($result)){
   while($row = mysqli_fetch_array($result)) {
      if($row) {
         $outRow = '<div class=\'postContainer\'>';
         $tID = $row['channelID'];

         $query2 = "SELECT postID FROM post WHERE channelID = '".$tID."';";
         $result2 = mysqli_query($con, $query2);


         if (!empty($result2)){ // channel was created
            $row2 = mysqli_fetch_array($result2);
            if ($row2){
               $outRow.='<div><p class=\'actionName\'> Channel <a class=\'channelName\' href=#>'.$row2['name'].'</a> was created</p></div>';
               //$outRow.='<div class=\'timeCont\'><span class=\'timeTitle\'>time posted: </span>';
               $outRow.='<span class=\'timeData\'> Time: '.$row['time_posted'].'</span>';
            }

         }

         $query2 = "SELECT title, channelID FROM post WHERE ID = '".$tID."';";
         $result2 = mysqli_query($con, $query2);

         if (!empty($result2)){ // post was created
            $row2 = mysqli_fetch_array($result2);
            if ($row2){
               $query3 = "SELECT name FROM channel WHERE ID = '".$row2['channelID']."';";
               $result3 = mysqli_query($con, $query3);

               $channelName = "";

               if (!empty($result3)){
                  $row3 = mysqli_fetch_array($result3);
                  $channelName = $row3['name'];
               }

               $outRow.='<div><p class=\'actionName\'> Posted a post on channel <a class=\'channelName\' href=#>'.$channelName.'</a>: </p></div>';
               $outRow.='<a class=\'post\' href=#>'.$row2['title'].'</a>';
               $outRow.='<br><span class=\'timeData\'> Time: '.$row['time_posted'].'</span>';
            }
         }

         $query2 = "SELECT * FROM comment WHERE ID = '".$tID."';";
         $result2 = mysqli_query($con, $query2);

         if (!empty($result2)){ // comment was created
            $row2 = mysqli_fetch_array($result2);
            if ($row2){

               $query3 = "SELECT channelID FROM post WHERE ID = '".$row2['postID']."';";
               $result3 = mysqli_query($con, $query3);

               $channelID = "";

               if (!empty($result3)){
                  $row3 = mysqli_fetch_array($result3);
                  if ($row3)
                     $channelID = $row3['channelID'];
               }

               $query3 = "SELECT name FROM channel WHERE ID = '".$channelID."';";
               $result3 = mysqli_query($con, $query3);

               $channelName = "";

               if (!empty($result3)){
                  $row3 = mysqli_fetch_array($result3);
                  $channelName = $row3['name'];
               }

               $outRow.='<div><p class=\'actionName\'> Left a comment on channel <a class=\'channelName\' href=#>'.$channelName.'</a>: </p></div>';
               $outRow.='<a class=\'comment\' href=#>'.$row2['body'].'</a>';
               $outRow.='<br><span class=\'timeData\'> Time: '.$row['time_posted'].'</span><br><br>';
            }
         }

         $outRow.='</div>';

         $output.=$outRow;
      }
   }
}


$result = mysqli_query($con, $query);


//echo $query;

?>

<!DOCTYPE html>
<html>
   <head>
   	<title><?PHP echo $userName;?>'s Log</title>
   </head>
   <body>
      <h2>History of <?PHP echo $userName;?>'s Activity</h2>
      <div class='container'>
         <?PHP if (!empty($result)){
            echo $output;
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
   .actionName {
      font-size: 20px;
      color: rgba(200,50,90,1);
      margin-left: 30px;
      width: 500px;
      overflow: hidden;
      text-overflow: ellipsis;
   }
   .post {
      margin-left: 50px;
      font-size: 17px;
      color: rgba(200,40,70,0.7);
   }
   .channelName {
      font-size: 20px;
      color: rgba(200,50,90,1);
   }
   .comment {
      margin-left: 50px;
      font-size: 17px;
      color: rgba(200,40,70,0.7);
   }
   a:hover{
      color: black;
   }

   span {
      position: absolute;
      margin-left: 450px;
   }
   .postContainer {
      //border-style: solid;
      //border-color: darkblue;
      //border-width: 2px;
   }
</style>
