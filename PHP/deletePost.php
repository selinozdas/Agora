<?php

include('server.php');

$postID = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "Fuck everyone";
    if (isset($_POST['delete_post_button'])) {
        $postID = $id;
        $rowToDelete = intval($_POST[`post`.`ID`]);
       // DELETE FROM `post` WHERE `post`.`ID` = 11 

        $query = "DELETE FROM `post` WHERE `post`.`ID` =" .$rowToDelete;// Or whatever your primary key is for the row, 
                                                                        //in my case "id". LIMIT 1 kind of gives added assurance that it won't delete tons of stuff if you make a mistake.

        $result = mysqli_query($con, $query);

       
        header('Location: http://localhost/agora/postsPage.php'); // Obviously, replace with the location of the page that you need it to redirect to.
    }
}
?>