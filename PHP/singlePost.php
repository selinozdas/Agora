<!DOCTYPE html>
<html>
    <head> 
        <title>Post</title>
    </head>

    <body> 


<?php


?>


<?php
    include('server.php');
    include('commentOperation.php');
   //echo "HELLO PAA..eE<br>";

    //$postID = $_SESSION['single_Post_ID'] ;

    $postID = $_GET['id'];

    $sql = "SELECT * FROM `post` WHERE `post`.`ID` = '".$postID ."' " ;
    $select_specfic_post_query =  mysqli_query($con, $sql);
    
    //c

    while($row = mysqli_fetch_array($select_specfic_post_query))
    {
        //$id = $postID;
        $id = $row["ID"]; //the post ID
        $title = $row["title"];
        $body = $row["body"];
        $created = $row["time_posted"];
        $rating = $row["rating"];

        //echo " The value we are looking at is of ID : ".$id ." <br> ";
        echo "<br> <h1> ".$title ." </h1><br> ";
        echo "   ".$body ." <br> ";

    }
    echo " 
    <form method='POST'  action='".setComments($con , $id)."'> 
        <input type = 'hidden' name='comment_ID'>
        <textarea name='commentText'></textarea><br>
        <button type='submit' name='comment_Button'>Comment</button>
    </form>";


    getComments($con , $id);
?>



</body>
</html>