<?php
include ("connection.php");
session_start();
//include_once ('loginCheck.php');
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
?>

<!DOCTYPE <html>
<head>
    <title>$name</title>
</head>
<body>
    <div <form action="profile.php">
    <div class="container">
        <div class="user_data">
        
        Name = <?php echo $name ?> <?php echo $surname ?><br>
        Username = <?php echo $u_name?><br>
        Password = **********<br>
        E-Mail = <?php echo $email ?><br>
        Reputation = <?php echo $rep?> points<br>
        Helpful Flags = <?php echo $flags ?>
        
        <img src='{$imgpath}' alt='Profile Picture' width='400' height='400'>
        </div>
    </div>
    </form>
    <form id="settings" action="settings.php" method="post">
        <input type="Submit" value="Settings" name="settingsbtn">
    </form>
    <form id="create_channel" action="createChannel.php" method="post">
        <input type="Submit" value="Create Channel" name="cchannelbtn">
    </form>
    <form id="delete_channel" action="deleteChannel.php" method="post">
        <input type="Submit" value="Delete Channel" name="dchannelbtn">
    </form>
</body>

</html>
