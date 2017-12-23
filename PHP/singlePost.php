<title>Post</title>
</head>

<body> 


<?php
    session_start();
    include ("connection.php");
    include('commentOperation.php');
    $postID = $_GET['id'];

    $sql = "SELECT * FROM `post` WHERE `post`.`ID` = '".$postID ."' " ;
    $select_specfic_post_query =  mysqli_query($con, $sql);

    echo "No Session set";
    // If session is set then display the comment button else remove
    if(isset($_SESSION['ID']))
    {
        echo "Session ID is set :";
        echo $_SESSION['ID'];
        $userID = $_SESSION['ID'];

        while($row = mysqli_fetch_array($select_specfic_post_query))
        {
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
        <form method='POST'  action='".setComments($con , $id , $userID)."'> 
            <input type = 'hidden' name='comment_ID'>
            <textarea name='commentText'></textarea><br>
            <button type='submit' name='comment_Button'>Comment</button>
        </form>";
    
    
        getComments($con , $id);   
    }
    else
    {

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
            echo "NEED TO LOGIN TO COMMENT";
    
        }
    
        getComments($con , $id); 

    }


?>