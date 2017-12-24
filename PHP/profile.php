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
        <img src='{$imgpath}' alt='Profile Picture' width='400' height='400'>   
        <br>
        <input type="Submit" value="Settings" name="settingsbtn">
        </div>
    </div>
    </form>
    <!--< form id="create_channel" action="createChannel.php" method="post">
        <input type="Submit" value="Create Channel" name="cchannelbtn">
    </form>
    <form id="delete_channel" action="deleteChannel.php" method="post">
        <input type="Submit" value="Delete Channel" name="dchannelbtn">
    </form> -->
</body>

</html>