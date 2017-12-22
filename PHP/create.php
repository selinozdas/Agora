<?php
include('server.php');

$post_name_variable = "";
$post_description_variable = "";

if(isset($_POST['post_button']) )
{
	
	$post_name_variable = $_POST['post_name_textbox'];
	$post_description_variable = htmlspecialchars($_POST['post_description_textbox']);
	echo "<h2> $post_name_variable </h2> " . "<br>" . $post_description_variable;
	
	
	$sql = "INSERT INTO `post`(`ID`, `title`, `body`, `rating`, `time_posted`) VALUES ( NULL, '$post_name_variable' , '$post_description_variable', 0, NOW())" ;
	mysqli_query($con, $sql);

}
else
{

	header("createPost.php");
	
	
}



?>

