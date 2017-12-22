<?php
//include('server.php');
session_start();
include ("connection.php");

$post_name_variable = "";
$post_description_variable = "";

if(isset($_SESSION['ID']))
{
	if(isset($_POST['post_button']) )
	{
		$userID = $_SESSION['ID'];
		$post_name_variable = $_POST['post_name_textbox'];
		$post_description_variable = htmlspecialchars($_POST['post_description_textbox']);
		echo "<h2> $post_name_variable </h2> " . "<br>" . $post_description_variable;
				
		//5000000 is the criminalmind channel ID
		$sql = "INSERT INTO `post`(`ID`, `title`, `body`, `rating`, `time_posted`, `userID`, `channelID`) VALUES (NULL,'$post_name_variable','$post_description_variable',0,NOW(),$userID,'500000000')";
		mysqli_query($con, $sql);

	}

}
else
{

	echo "Sorry you are not logged in. You need to be logged in for this feature";
	header( "refresh:3;url=createPost.php" );
	usleep(5000000);
}






?>

