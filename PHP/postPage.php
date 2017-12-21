<?php
	include('server.php');
	echo '<table>';
	$sql = "SELECT * FROM `post`" ;
	$query = mysqli_query($con , $sql);
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
		$count++;
		/* echo '<table>
		 <tr>
		 <td>ID</td>
		 <td>'.$id.'</td>
		 <td>'.$title.'</td>
		 </tr>
		</table>';*/
		
		if(isset($_POST['delete_post_button']) )
		{
			echo "inside echo";
			$sqlTemp = "SELECT `ID` FROM `post`";
			$tempResult = mysqli_query($con,$sqlTemp);
			
			while($tempRow = mysqli_fetch_array($tempResult)){
				if(isset($_POST[$tempRow["ID"]]) ){
					echo "Done";
					echo "The aldoooo";
					$idToDEl = $tempRow["ID"] ;
					unset($_POST[$tempRow["ID"]]);
					$sql = "DELETE FROM `post` WHERE `post`.`ID` = '$idToDEl' " ;
					mysqli_query($con, $sql);
					break;
				}
			}
		
			//$idToDelete = $id;
		

		}


		echo
		
		'<ul>
		<form action ="http://localhost/agora/postPage.php" method = "post" >

			<div name = "individualComment" style="list-style-type:none">
				<div align="left"><h2> '. $rating . '</h2> 
				
					<div>
					<li>	<h2>' .$title .'</h2>  </li>
					<li>' . $created . '</li>			
					</div>

				</div>

				<button type="submit" name="delete_post_button" id = '. $id . ' >Post</Button>
					
				
			</div>

		</form>
		</ul>';


		
			
	}
		
	}

?>


