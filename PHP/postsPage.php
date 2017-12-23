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
				//echo "The ssession has been set :";
				//echo $userID;

				if(isset($_POST['delete_post_button']) )
				{
					$usingID = $_POST['row_id'];

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
								<div align="left">
								
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
				}
				
				
		}
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
					/*echo "The user ID is :";
					echo $_SESSION['ID'];*/
					$userID = $_SESSION['ID'];
					//unset($_SESSION['ID']);
				}
	
					echo '
					<body>
						<ul>
							<form action ="http://localhost/agora/postsPage.php" method = "post" >
	
								<div name = "individualComment" style="list-style-type:none">
									<div align="left">
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

							</form>
						</ul>
					</body> ';
					

				}//in while loop
			}
	}
?>