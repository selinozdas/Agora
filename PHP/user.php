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

    <?php
            session_start();
            include ("connection.php");
            $userID = 1000000000;

            $sql = "SELECT * FROM `user` WHERE `user`.`ID` ='".$userID."' ";
            $query =  mysqli_query($con, $sql); 


            if( !empty($query))
            {
                while($row = mysqli_fetch_array($query))
                {
                    $userName = $row["username"];
                    $email = $row["email"];
                    $firstName = $row["firstName"];
                    $lastName = $row["lastName"];
                    $numberOfVotes = $row["up_down_votes"];
                    $numberOfFlag = $row["helpful_fags"];
                    $numberOfReports = $row["number_of_reports"];
                    $reputation = $row["total_reputation"];
    
                    echo"
                    <div style = 'text-align: center ; padding-top: 250px;'>
                        First Name     : ".$userName." <br>
                        Last Name      : ".$lastName." <br>
                        email          : ".$email." <br>
                        HelpFul Points : " .$numberOfFlag." <br>
                        Reputation     :".$reputation." <br>


                    </div>
                
                
                    ";
                    
    
                }

            }
            else{

                echo "No users By that name";
            }
           


    ?>

</body>



</html>