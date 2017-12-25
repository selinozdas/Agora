<!DOCTYPE html>
<html>
<title>Post</title>
<head>

<!-- your webpage info goes here -->
	
	<meta name="author" content="Group 8" />
	<meta name="description" content="" />

<!-- you should always add your stylesheet (css) in the head tag so that it starts loading before the page html is being displayed -->	
	<link rel="stylesheet" href="../CSS/style.css" type="text/css" />
	
</head>
<body> 

<div id="page">
		<div id="nav">
			<ul>
				<li><a href="home.php">home</a></li>
				&nbsp; 
				<li><a href="channels.php">channels</a></li>
				&nbsp;  
				<li><a href="login.php">login</a></li>
				&nbsp;
				<li><a href="search.php">search</a></li>
				&nbsp; 
			</ul>	
        </div>

    <div style="text-align:left">
    <?php
        session_start();
        include ("connection.php");
        include('commentOperation.php');
        $postID = $_GET['ID'];

        $sql = "SELECT * FROM `post` WHERE `post`.`ID` = '".$postID ."' " ;
        $select_specfic_post_query =  mysqli_query($con, $sql);    // If session is set then display the comment button else remove

        if(isset($_SESSION['ID']))
        {
            /*echo "Session ID is set :";
            echo $_SESSION['ID'];*/
            $userID = $_SESSION['ID'];

            while($row = mysqli_fetch_array($select_specfic_post_query))
            {
                $id = $row["ID"]; //the post ID
                $title = $row["title"];
                $body = $row["body"];
                $created = $row["time_posted"];
                $rating = $row["rating"];
        
                //echo " The value we are looking at is of ID : ".$id ." <br> ";
                echo "<h1> ".$title ." </h1> ";
                echo "   ".$body ." <br> ";
        
            }
            echo " 
            <form method='POST'  action='".setComments($con , $id , $userID)."'> 
                <input type = 'hidden' name='comment_ID'>
                <textarea name='commentText' cols='100' rows='5'></textarea><br>
                <button type='submit' name='comment_Button'>Comment</button>
            </form>";
            getComments($con , $id);
          // $_SESSION['ID'] = $userID;


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
                echo "<h1> ".$title ." </h1> ";
                echo "   ".$body ." <br> ";
                echo "NEED TO LOGIN TO COMMENT";
        
            }
        
            getComments($con , $id); 

        }


    ?>

    </div>
</div>
</body> 
</html>