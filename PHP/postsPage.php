<?php
	session_start();
	include ("connection.php");
	echo '<table>';
	$sql = "SELECT * FROM `post`" ;
	$query = mysqli_query($con , $sql);
	$userID;
	
	if(isset($_SESSION['ID']))
	{

		if( !empty($query))
		{
			$count = 0;
			while($row = mysqli_fetch_array($query))
			{
				$id = $row["ID"];
				$title = $row["title"];
				$body = $row["body"];
				$created = $row["time_posted"];
				$rating = $row["rating"];
				
			

				$userID = $_SESSION['ID'];
				echo "The ssession has been set :";
				echo $userID;


				$count++;

				//echo "The user ID is :" .$userID;
				if(isset($_POST['delete_post_button']) )
				{
				
					//$usingID = mysqli_real_escape_string($db, $row["ID"]);

					//get me the postID//
					$usingID = $_POST['row_id'];

					//$sql = "DELETE FROM `post` WHERE `post`.`ID` = '".$_POST['row_id']."' " ;
		
					//delete all links between postasand comments//
					/*$deleteHasCommentSql = "DELETE FROM `has_comment` WHERE `has_comment`.`postID` = '$usingID'";
					mysqli_query($con, $deleteHasCommentSql);*/

					//delete all comments//
					//$getCommentsSql =  "SELECT `commentID` FROM `has_comment` WHERE `has_comment`.`postID` = '$usingID'";
					/*$getCommentsSql =  "SELECT `commentID` FROM `comment` WHERE `comment`.`postID` = '$usingID'";
					$query2= mysqli_query($con , $getCommentsSql);
					if( !empty($query2))
					{
						while($row = mysqli_fetch_array($query2))
						{
							$comment_id = $row['commentID'];
						
							$deleteCommentSql = "DELETE FROM `comment` WHERE `comment`.`ID` = '$comment_id'";
							mysqli_query($con, $deleteCommentSql);
						}
					
					}*/

					$deleteCommentSql = "DELETE FROM `comment` WHERE `comment`.`PostID` = '$usingID'";
					mysqli_query($con, $deleteCommentSql);
					
					//delte post
					$sql = "DELETE FROM `post` WHERE `post`.`ID` = '$usingID' " ;
					mysqli_query($con, $sql);
					
					unset($_POST['delete_post_button']);
					header("Location: postsPage.php"); 
				}

				echo '
				<body>
					<ul>
						<form action ="http://localhost/agora/postsPage.php" method = "post" >

							<div name = "individualComment" style="list-style-type:none">
								<div align="left"><h2> '. $rating . '</h2> 
								
									<div>
									<input type = "hidden"  name="row_id" value=" ' .$row["ID"]. '  ">
									<li>	<a href="http://localhost/agora/singlePost.php?id='.$row["ID"].'"><h2>' .$title .'</h2> </a> </li> ';
									
									/*if(isset($_POST['delete_post_button']) )
									{

										$_SESSION['single_Post_ID'] = $_GET['row_id'];
									}*/




									echo'
									<li>' . $created . '</li>			
									</div>

								</div>

								<button type="submit" name="delete_post_button">Delete</Button>
								
							</div>

						</form>
					</ul>
				</body> ';
				

			}//inside while
			
		}
	//	unset($_SESSION['ID']);
	}


	else
	{

		if( !empty($query))
		{
			$count = 0;
			while($row = mysqli_fetch_array($query))
			{
				$id = $row["ID"];
				$title = $row["title"];
				$body = $row["body"];
				$created = $row["time_posted"];
				$rating = $row["rating"];


				if(isset($_SESSION['ID']))
				{
					echo "The user ID is :";
					echo $_SESSION['ID'];
					$userID = $_SESSION['ID'];
					//unset($_SESSION['ID']);

				}

				echo '
				<body>
					<ul>
						<form action ="http://localhost/agora/postsPage.php" method = "post" >

							<div name = "individualComment" style="list-style-type:none">
								<div align="left"><h2> '. $rating . '</h2> 
								
									<div>
									<input type = "hidden"  name="row_id" value=" ' .$row["ID"]. '  ">
									<li>	<a href="http://localhost/agora/singlePost.php?id='.$row["ID"].'"><h2>' .$title .'</h2> </a> </li> ';
									
									/*if(isset($_POST['delete_post_button']) )
									{

										$_SESSION['single_Post_ID'] = $_GET['row_id'];
									}*/




									echo'
									<li>' . $created . '</li>			
									</div>

								</div>
								
							</div>

						</form>
					</ul>
				</body> ';
				

			}//inside while
			
		}



	}


?>



