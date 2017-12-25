<?php
	session_start();
	include ("connection.php");
	echo '<table>';
	$userID = $_SESSION['ID'];
	$sql = "SELECT * FROM `channel` where userID = '$userID'" ;	
	$query = mysqli_query($con , $sql);
	
	
	if(isset($_SESSION['ID']))
	{
		if( !empty($query))
		{
			$count = 0;
			while($row = mysqli_fetch_array($query))
			{
				$id = $row["ID"];
				$title = $row["name"];
				$body = $row["description"];
				$created = $row["since"];		
				$userID = $_SESSION['ID'];

				if(isset($_POST['delete_post_button']) )
				{
					$usingID = $_POST['row_id'];

					$deleteprivateSql = "DELETE FROM `private_channel` WHERE `private_channel`.`ID` = '$usingID'";
					mysqli_query($con, $deleteprivateSql);
					
					//delte post
					$sql = "DELETE FROM `channel` WHERE `channel`.`ID` = '$usingID' " ;
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
				$title = $row["name"];
				$body = $row["description"];
				$created = $row["since"];
				$userID = $row["userID"];
		
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