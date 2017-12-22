
<?php

    function setComments($con , $postID , $userID)
    {
        if(isset($_POST['comment_Button']) )
        {


            $commentID  = $_POST['comment_ID'];
            $body = $_POST['commentText'];
            $commentRating = 0;

           // $sql =  "INSERT INTO `comment`(`ID`, `body`, `since`, `rating`, `helpful_flag`, `time_posted`) VALUES (NULL,'$body',NOW(),'$commentRating',0,NOW()) ";
            $sql =  "INSERT INTO `comment`(`ID`, `body`, `since`, `rating`, `helpful_flag`, `time_posted`, `userID`, `postID`) VALUES (NULL,'$body',NOW(),'$commentRating',0,NOW(),$userID, $postID)";
            mysqli_query($con, $sql);

            //get me teh last iadded ID
           // $newCommentID = mysqli_insert_id($con);
          //$sql2 =  "INSERT INTO `has_comment`(`commentID`, `postID`) VALUES ('".$newCommentID."','".$postID."') ";
           //mysqli_query($con, $sql2);

           unset($_POST['comment_Button']);
        }

    }


    function getComments($con , $post_ID , $userID)
    {
        $getCommentsSql =  "SELECT * FROM `comment` WHERE `postID` = '".$post_ID."' ";
        $query2= mysqli_query($con , $getCommentsSql);
        
        if( !empty($query2))
        {
            while($row = mysqli_fetch_array($query2))
            {
                echo "<div><p>" ;
                echo $row['ID'] ."<br>";
                echo $row['time_posted'] ."<br>";
                echo $row['body'] ."<br>";
                echo "</div>";
            }
        }

    /*    $getCommentsSql =  "SELECT `commentID` FROM `has_comment` WHERE `postID` = '".$post_ID."' ";
        $query2= mysqli_query($con , $getCommentsSql);
        
        if( !empty($query2))
        {
            while($row = mysqli_fetch_array($query2))
            {

                $comment_id = $row['commentID']; //the post ID
                $sql = "SELECT * FROM `comment` WHERE `ID` = '".$comment_id."' ";               
                $query = mysqli_query($con , $sql);

                if( !empty($query))
                {
                    while($row = mysqli_fetch_array($query))
                    {

                        echo "<div><p>" ;
                            echo $row['ID'] ."<br>";
                            echo $row['time_posted'] ."<br>";
                            echo $row['body'] ."<br>";
        
                        echo "</div>";
                    }
        
                }

            }


        }
      */  
    }

?>