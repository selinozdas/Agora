<?php
include ("connection.php");
session_start();
if(!$_SESSION['username']){
    header("Location: home.php");
}
//fetch user
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
if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['settingsbtn'])
{
    header("Location: settings.php");
}
?>

<!DOCTYPE <html>
<head>
    <title>$name</title>
</head>
<body>
    <form id="profile" action="profile.php" method="post">
    <div class="container">
        <div class="user_data">
        
        Name = <?php echo $name ?> <?php echo $surname ?><br>
        Username = <?php echo $u_name?><br>
        Password = **********<br>
        E-Mail = <?php echo $email ?><br>
        Reputation = <?php echo $rep?> points<br>
        Helpful Flags = <?php echo $flags ?>
        <br>
        <img border="0" alt="User" src="<?php echo $imgpath ?>" width="100" height="100">
        <br>
        <input type="Submit" value="Settings" name="settingsbtn">
        </div>
    </div>
    </form>
</body>

</html>