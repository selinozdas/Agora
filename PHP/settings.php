<?php 
include_once ('connection.php');
session_start();
if (isset($_SESSION['username'])!="")
{
    $u_name = $_SESSION['username'];
    $query = 'SELECT * FROM user WHERE username LIKE \'' . $u_name . '\';';
    $result = mysqli_query($con , $query);
    $row = mysqli_fetch_array($result);
    $name = $row['firstName'];
    $surname = $row['lastName'];
    $email = $row['email'];
    $rep = $row['total_reputation'];
    $flags = $row['helpful_fags'];
    $imgpath = $row['picture'];
    $pass = $row['password'];
}
if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['apply'])
{
    $match=true;
    if($_POST['firstName'] != "" && $_POST['firstName'] != $name)
    {
        $qName = 'UPDATE user SET firstName = \'' . $_POST['firstName'] . '\' WHERE username LIKE \'' . $u_name . '\' ;';
        mysqli_query($con , $qName);
    }
    if($_POST['lastName'] != "" && $_POST['lastName'] != $surname)
    {
        $qSurname = 'UPDATE user SET lastName = \'' . $_POST['lastName'] . '\' WHERE username LIKE \'' . $u_name . '\' ;';
        mysqli_query($con , $qSurname);
    }
    if($_POST['email'] != "" && $_POST['email'] != $email)
    {
        $qEmail = 'UPDATE user SET email = \'' . $_POST['email'] . '\' WHERE username LIKE \'' . $u_name . '\' ;';
        mysqli_query($con , $qEmail);
    }
    if($_POST['passwd'] != "" && $_POST['passwd'] != $pass)
    {
        if($_POST['passwd'] == $_POST['cpasswd'])
        {
            $qPass = 'UPDATE user SET password = \'' . $_POST['passwd'] . '\' WHERE username LIKE \'' . $u_name . '\' ;';
            mysqli_query($con , $qPass);
        }
        else
        {
            $match=false;
            $message = "Passwords do not match!";
            echo "<script type='text/javascript'>alert('$message');</script>";
            header("Refresh:0");
        }
    }
    if($match)
    {header("Location: profile.php");}
}
if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['cancel'])
{
    header("Location: profile.php");
}
if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['delete'])
{
    $delquery = 'DELETE FROM user WHERE username LIKE \'' . $u_name . '\' ;';
    mysqli_query($con , $delquery);
    header("Location: logout.php");
}
?>
<!DOCTYPE <html>
<head>
    <title>Settings</title>
</head>
    <form id = "settings" action="settings.php" method="post">
 		 <div class="container">
			 <div class="set_data">
			 	<div class="set_data_row">
               <label class = "input_label">First Name</label>
               <input class = "input_text_box" type="text" placeholder="Enter First Name" name="firstName">
               <br>
               <label class = "input_label">Last Name</label>
    				<input class = "input_text_box" type="text" placeholder="Enter Last Name" name="lastName">
               <br>
               <label class = "input_label">E-mail</label>
    				<input class = "input_text_box" type="email" multiple placeholder="Enter E-mail" name="email">
               <br>
               <label class = "input_label">Password</label>
    				<input class = "input_text_box" type="password" placeholder="Enter Password" name="passwd">
				</div>
				<div class="set_data">
    				<label class = "input_label">Confirm Password</label>
    				<input class = "input_text_box" type="password" placeholder="Enter Password" name="cpasswd">
				</div>
			</div>
                <input type="Submit" value="Apply" name="apply"> 
                <input type="Submit" value="Cancel" name="cancel">
                <input type="Submit" value="Delete Account" name="delete">
      </div>
    </form>
