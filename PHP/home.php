<?PHP
   include ('connection.php');
   session_start();
   $username = $_SESSION['username'];

   $query = 'SELECT ID, rating, title, time_posted
   FROM
       (SELECT channelID FROM subscribes WHERE userID = \''.$_SESSION['ID'].'\') AS T1
       JOIN
       (SELECT ID, rating, title, time_posted, channelID FROM post) AS T2
       ON T1.channelID = T2.channelID
   ORDER by rating DESC;';

   $result = mysqli_query($con, $query);

   $outRow ='<div class=\'postContainer\'>';
   while($row = mysqli_fetch_array($result)) {
      if($row) {

         $outRow.='<a class=\'post\' href=#>'.$row['title'].'</a>';
         $outRow.='<span class=\'timeData\'> Time: '.$row['time_posted'].'</span><br>';
      }
   }
   $outRow.='</div>';
?>


<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<body>
   <?PHP if (isset($_SESSION['username'])){?>
   <h3>Hello, <?PHP echo $username;?> </h3>
   <?PHP } else {
      header('Location: login.php');
   }?>
   <form id="logout_form" action="logout.php" method="post">
	     <input type="Submit" value="Log Out" name="logoutbtn">
   </form>
   <div class='feed'>
      <?PHP if (!empty($result)){
         echo $outRow;
      }?>

   </div>
</body>
</html>
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
