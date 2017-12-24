<!DOCTYPE html>
<html>
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

    <div style="text-align:center">
        
        <h2>"Enter The Post You Would Like To Search"</h2>
        
        <form id="search_form" action="search.php" method="post">
            <input type="text" name="search" placeholder="Search for post">
            <input type= "submit" value= ">>"/>
        </form>

        <?PHP
        session_start();
        include ("connection.php");

            $output='';
            if(isset($_POST['search'])){
                $searchkey= $_POST['search'];
                $searchkey=preg_replace("#[^0-9a-z]#i", "", $searchkey);     // Remove all back spaces
                $sqlIndex= "CREATE INDEX index_post USING BTREE ON post(title)";   //create index based on the post title
                mysqli_query($con, $sqlIndex);

                $sqlSearch = "SELECT * FROM post WHERE title LIKE '%$searchkey%'";
                $query = mysqli_query($con,$sqlSearch) or die("Could not search!");
                $count = mysqli_num_rows($query);

                if($count == 0){
                    $output="There was no search result!";
                    echo $output;
                }
                else{
                    while($row=mysqli_fetch_array($query)){
                        $fname=$row['title'];
                        echo'
                        <input type = "hidden"  name="row_id" value=" ' .$row["ID"]. '  ">	<li>
                        <a href="singlePost.php?id='.$row["ID"].'"><h2>' .$fname .'</h2> </a> </li> 
                        ';
                    }
                }
                
                //we drop the index now
                $sqlDrop= "DROP INDEX index_post ON post";
                mysqli_query($con, $sqlDrop);
                unset($_POST['search']);
            }
        ?>
    
    </div>
    
</div>
</body>
</html>