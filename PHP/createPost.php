<!DOCTYPE html>
<html>

	<head>
	  <title>Posts</title>
	</head>
	
<body>
	<!-- When clicked on the Post button it is send to the create.php , where the post is added into the database using mysql_affected_rows -->
	<form action ="http://localhost/agora/create.php" method = "post" >
		
		<h2> Create Post </h2>
		Post Title : <input type = "text" name = "post_name_textbox"> <br> 
		Post Title : <br> 
		<textarea name = "post_description_textbox" maxlength = "8000">  </textarea><br>
		<button type="submit" name="post_button">Post</Button>
		
	</form>

</body>

</html>

