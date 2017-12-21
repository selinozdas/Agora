<?php session_start();
//check whether the user has logged in or not
$logged_in = false;
if (isset($_SESSION['username'])!="")
{
    $logged_in=true;
}
//fetch user
$u_name = $_REQUEST['username'];
$query_1 = mysqli_query($dbname, "select * from user where username = $u_name");
$row = mysql_fetch_array($query_1);
$name = "{$row['firstName']} {$row['lastName']}";
$email = "{$row['email']}";
$rep = "{$row['total_reputation']}";
$flags = "{$row['helpful_fags']}";
$imgpath = "{$row['picture']}";
?>

<!DOCTYPE <html>
<head>
    <title>$name</title>
</head>
<body>
    <div class="container">
        <div class="user_data">
        <p>
        Name =<?php echo $name ?><br>
        Username = <?php echo $u_name?><br>
        Password = **********<br>
        E-Mail = <?php echo $email ?><br>
        Reputation = <?php echo $rep?>k points<br>
        Helpful Flags = <?php echo $flags ?>
        </p>
        <img src='{$imgpath}' alt='Profile Picture' width='400' height='400'>
        </div>
    </div>
    <form id="settings" action="settings.php" method="post">
        <input type="Submit" value="Settings" name="settingsbtn">
    </form>
    <form id="create_channel" action="createChannel.php" method="post">
        <input type="Submit" value="Create Channel" name="cchannelbtn">
    </form>
    <form id="delete_channel" action="deleteChannel.php" method="post">
        <input type="Submit" value="Delete Channel" name="cchannelbtn">
    </form>
</body>

</html>