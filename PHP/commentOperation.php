<html>
    <link rel="stylesheet" href="../CSS/style.css" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</html>
<?php 

    function setComments($con , $postID , $userID)
    {

            if(isset($_POST['comment_Button']) )
            {
                
                $commentID  = $_POST['comment_ID'];
                $body = $_POST['commentText'];
                $commentRating = 0;
                $sql =  "INSERT INTO `comment`(`ID`, `body`, `since`, `rating`, `helpful_flag`, `time_posted`, `userID`, `postID`) VALUES (NULL,'$body',NOW(),'$commentRating',0,NOW(),$userID, $postID)";
                mysqli_query($con, $sql);
                $newCommentID = mysqli_insert_id($con);
    
                unset($_POST['comment_Button']);
            }
    
        

    }

    function setReply($con , $commentID  ,$postID)
    {
        
        /*if(isset($_SESSION['ID']))
        {
            $userID = $_SESSION['ID'];
        }*/
            if(isset($_POST['reply_Button']) )
            {
                $userID = $_SESSION['ID'];
                //$replyID  = $_POST['reply_ID'];
                $body = $_POST['reply_Text'];
                $commentRating = 0;
    
                $sql =  "INSERT INTO `comment`(`ID`, `body`, `since`, `rating`, `helpful_flag`, `time_posted`, `userID`, `postID`) VALUES (NULL,'$body',NOW(),'$commentRating',0,NOW(),$userID, $postID)";
                mysqli_query($con, $sql);
                $replyID =  mysqli_insert_id($con);

                $sql2 = "INSERT INTO `replies`(`childCommentID`, `parentCommentID`) VALUES ('$replyID','$commentID')";
                mysqli_query($con, $sql2);
    
                unset($_POST['reply_Button']);
                
                getReply($con , $commentID , $replyID);

            }



    }

  /*  function getReply($con , $parentCommentID , $replyID)
    {
        $getReplySql =  "SELECT * FROM `comment` WHERE `postID` = '".$replyID."' ";
        $queryReply= mysqli_query($con , $getReplySql);

        if( !empty($queryReply))
        {
            while($row = mysqli_fetch_array($queryReply))
            {
                echo
                "
                <div><p>
                ". $row['time_posted'] ."<br>
                ".$row['body']."<br>

                </div> ";

            }
        }
        else{
            echo "Empty";
        }/**/

       // header("Location: singlePost.php"); 
   // }


   function getReply($con , $parentCommentID)
    {

        $getReplySql1 =  "SELECT * FROM `replies` WHERE `parentCommentID` = '".$parentCommentID."' ";
        $queryParent= mysqli_query($con , $getReplySql1);

        if(!empty($queryParent))
        {
            while($row1 = mysqli_fetch_array($queryParent))
            {
                $replyID = $row1['childCommentID'];
                $getReplySql =  "SELECT * FROM `comment` WHERE `postID` = '".$replyID."' ";
                $queryReply= mysqli_query($con , $getReplySql);
                if( !empty($queryReply))
                {
                    while($row = mysqli_fetch_array($queryReply))
                    {
                        echo
                        "
                        <div class = 'reply_area'><p>
                        ". $row['time_posted'] ."<br>
                        ".$row['body']."<br>
        
                        </div> ";
        
                    }
                }
                else
                {

                    echo "it is empty";
                }

            }
        }
       else{
            echo "Empty";
      }

       // header("Location: singlePost.php"); 
    }

    function getComments($con , $post_ID )
    {
        $getCommentsSql =  "SELECT * FROM `comment` WHERE `postID` = '".$post_ID."' ";
        $query2= mysqli_query($con , $getCommentsSql);

        $getUserSql = "SELECT 'username' FROM 'post' WHERE `postID` = '".$post_ID."' LIMIT 1";
        $userNameQuery = mysqli_query($con ,$getUserSql);

        if( !empty($query2))
        {
            while($row = mysqli_fetch_array($query2))
            {
                echo
                "
                <div class = 'comment_area'><p>
                ". $row['time_posted'] ."<br>
                ".$row['body']."<br>

                <a style = 'color: #2E8B57' href = '/'><i class='fa fa-arrow-up'></i></a> 
                <a style = 'color: #2E8B57' href = '/'>90k</a>
                <a style = 'color: #2E8B57' href = '/'><i class='fa fa-arrow-down'></i></a>&nbsp;
                <a style='font-size: 12px; color: #0080ff'>share</a> &nbsp; 
                <a style='font-size: 12px; color: #990000'>report</a>

                <form method='POST'  action='".setReply($con , $row['ID'] , $post_ID)."'> 
                        <input type = 'hidden' name='reply_ID'>
                        <textarea name='reply_Text' cols='100' rows='5'></textarea><br>
                        <button type='submit' name='reply_Button'>Reply</button>
                    </form>
                </div>

                ";
                getReply($con ,  $row['ID'] );
                /*echo "<div class = 'comment_area'><p>" ;
                echo $row['time_posted'] ."<br>";
                echo "By : ".$userName ."<br>";
                echo $row['body'] ."<br>";
                echo "</div>";*/
            }
        }   


        if( !empty($query2))
        {
            while($row = mysqli_fetch_array($query2))
            {
                $comment_id = $row['commentID']; //the post ID
                $sql = "SELECT * FROM `comment` WHERE `ID` = '".$comment_id."' ";         
                $query = mysqli_query($con , $sql);

            }
        }

    }

?>