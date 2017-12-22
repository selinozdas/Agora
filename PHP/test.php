<?PHP
include ("connection.php");
session_start();
/*
$query = 'SELECT ID FROM post;';
$result = mysqli_query($con, $query);

$posts=array();

if (!empty($result)){
   while($row = mysqli_fetch_array($result)) {
      if($row) {
         array_push($posts, $row['ID']);
         $query2 = 'SELECT ID FROM comment WHERE postID=\''.$row['ID'].'\';';
         $result2 = mysqli_query($con, $query2);

         $comments=array();

         if (!empty($result2)){
            while($row2 = mysqli_fetch_array($result2)) {
               if($row2) {
                  array_push($comments, $row2['ID']);
               }
            }
         }
         for ($i=0; $i<count($comments)/3; $i++){
            $c1 = $comments[rand(0, count($comments) - 1)];
            $c2 = $comments[rand(0, count($comments) - 1)];

            if ($c1!=$c2){
               $query3 = 'INSERT INTO replies VALUES(\''.$c1.'\',\''.$c2.'\');';
               $result3 = mysqli_query($con, $query3);

               echo $query3."<br>";
            }
         }

      }
   }
}
*/


/*
$query = 'SELECT ID FROM channel;';
$result = mysqli_query($con, $query);

$channels=array();

if (!empty($result)){
   while($row = mysqli_fetch_array($result)) {
      if($row) {
         array_push($channels, $row['ID']);
      }
   }
}

$query = 'SELECT ID FROM user;';
$result = mysqli_query($con, $query);

$users=array();

if (!empty($result)){
   while($row = mysqli_fetch_array($result)) {
      if($row) {
         array_push($users, $row['ID']);
      }
   }
}

for ($i=0; $i<50; $i++){
   $user = $users[rand(0, count($users) - 1)];
   $channel = $channels[rand(0, count($channels) - 1)];

   $query = 'INSERT INTO subscribes VALUES(\''.$user.'\',\''.$channel.'\');';
   $result = mysqli_query($con, $query);
   echo $query."<br>";
}
*/
/*
$query = 'SELECT ID FROM comment;';
$result = mysqli_query($con, $query);

if (!empty($result)){
   while($row = mysqli_fetch_array($result)) {
      if($row) {
         $rating = rand (0, 500);
         $flags = rand (0, 20);
         $query2 = 'UPDATE comment SET rating=\''.$rating.'\', helpful_flag=\' '.$flags.'\' WHERE ID=\''.$row['ID'].'\';';
         $result2 = mysqli_query($con, $query2);
      }
   }
}*/
/*
   $query = 'SELECT ID FROM post;';
   $result = mysqli_query($con, $query);

   $posts=array();

   if (!empty($result)){
      while($row = mysqli_fetch_array($result)) {
         if($row) {
            array_push($posts, $row['ID']);
         }
      }
   }

   $query = 'SELECT ID FROM user;';
   $result = mysqli_query($con, $query);

   $users=array();

   if (!empty($result)){
      while($row = mysqli_fetch_array($result)) {
         if($row) {
            array_push($users, $row['ID']);
         }
      }
   }

   $pronoun = array(
      "I\'m",
      "You\'re",
      "He\'s",
      "She\'s",
      "Life is",
      "Post is",
      "Channel is",
      "Don\'t be",
      "I want to be",
      "They are going to be",
      "You will be",
      "Comment is",
      "Post is",
      "Discussion seems to be",
      "My life is",
      "Your life is",
      "Don\'t worry! It will be",
      "Sorry, but it is",
      "Hope it will be",
      "Sounds"
   );

   $action = array(
       "stacking",
       "overflowing",
       "confused",
       "bewildered",
       "wondering how many more of these I can make up",
       "getting bored... So that\'s enough for now...",
       "wonderful",
       "sleepy",
       "confusing",
       "overwhelmed",
       "surprising",
       "interesting",
       "amazing",
       "unbelievable",
       "ridiculus",
       "like a monster",
       "like a rainbow",
       "horrible",
   );

   for ($i=0; $i<1000; $i++){
      $user = $users[rand(0, count($users) - 1)];
      $post = $posts[rand(0, count($posts) - 1)];
      $comment = $pronoun[array_rand($pronoun)] . ' ' . $action[array_rand($action)];

      echo $user.'<br>'.$post.'<br>'.$comment.'<br>'.'<br>';

      $query = 'INSERT INTO comment VALUES(
         NULL,\''.$comment.'\',CURRENT_TIMESTAMP,\'0\',\'0\',CURRENT_TIMESTAMP,\''.$user.'\',\''.$post.'\');';
      $result = mysqli_query($con, $query);
      echo $query;
   }
   */
   /*
   SELECT object_postedID, time_posted
FROM (SELECT ID AS object_postedID, since AS time_posted, userID FROM channel
         UNION
      SELECT ID  AS object_postedID, time_posted, userID FROM post
      	UNION
      SELECT ID  AS object_postedID, time_posted, userID FROM comment
     ) AS T
WHERE userID = '1000000000'
ORDER by time_posted DESC;
   */

?>
