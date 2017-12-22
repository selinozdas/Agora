<?PHP
   session_start();
   include ("connection.php");

?>


<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<body>
   <?PHP if (isset($_SESSION['username'])){?>
   <h3>Hello, <?PHP echo $_SESSION['username'];?> </h3>
   <?PHP } else {?>
   <h3>Home!</h3>
   <?PHP }?>
   <form id="logout_form" action="logout.php" method="post">
	     <input type="Submit" value="Log Out" name="logoutbtn">
   </form>

   <form id="search_form" action="home.php" method="post">
	     <input type="text" name="search" placeholder="Search for post">
         <input type= "submit" value= ">>"/>
   </form>

</body>
</html>

<?php
    $output='';
    if(isset($_POST['search'])){
        $searchkey= $_POST['search'];
        //$searchkey=preg_replace("#[^0-9a-z]#i", "", $searchkey);

        //create index based on the post title
        $sqlIndex= "CREATE INDEX index_post USING BTREE ON post(title)";
        mysqli_query($con, $sqlIndex);

        $sqlSearch = "SELECT * FROM post WHERE title LIKE '%$searchkey%'";
        $query = mysqli_query($con,$sqlSearch) or die("Could not search!");
        $count = mysqli_num_rows($query);

        if($count == 0){
            $output="There was no search result!";
        }
        else{
            while($row=mysqli_fetch_array($query)){
                $fname=$row['title'];
                $output .='<div>'.$fname.'</div>';
                echo "$output";

            }
        }
        
        //we drop the index now
        $sqlDrop= "DROP INDEX index_post ON post";
        mysqli_query($con, $sqlDrop);
    }
?>
