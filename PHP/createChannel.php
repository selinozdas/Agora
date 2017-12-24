<?PHP
include ("connection.php");
session_start();
if(!$_SESSION['username'])
{
    header("Location: home.php");
}
$u_name = $_SESSION['username'];
$query = 'SELECT * FROM user WHERE username LIKE \'' . $u_name . '\';';
$result = mysqli_query($con , $query);
$row = mysqli_fetch_array($result);
$userID = $row['ID'];
if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['create'])
{
    $title = $_POST['title'];
    $des = $_POST['desc'];
    if($_POST['title'])
    {
        $query1 = 'INSERT INTO channel VALUES(NULL, \'' . $title . '\' , \'' .$des  . '\', \'' .$userID . '\', NOW());';
        $result1 = mysqli_query($con, $query1);
        if($_POST['isPrivate'])
        {
            $query2 = 'SELECT ID FROM channel WHERE userID =\'' .$userID . '\' ORDER BY ID DESC LIMIT 1;';
            $result2 = mysqli_query($con, $query2);
            $row2 = mysqli_fetch_array($result2);
            $cID = $row2['ID'];
            $query3 = "INSERT INTO private_channel VALUES('$cID');";
            $result3 = mysqli_query($con, $query3);
        }
        header("Location: home.php");
    }
}
if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['cancel'])
{
    header("Location: home.php");
}
?>
<!DOCTYPE <html>
<head>
    <title>Create Channel</title>
</head>
    <form id = "createchannel" action="createChannel.php" method="post">
 		 <div class="container">
          <div class="set_data">
               Title  <input class = "input_text_box" type="text" placeholder="Enter Title" name="title">
               <br>
               Description <input class = "input_text_box" type="text" placeholder="Enter Description" name="desc">
               <br>
               Is this a private channel? <input type="checkbox" name="isPrivate">
               <br>
                <input type="Submit" value="Create" name="create"> 
                <input type="Submit" value="Cancel" name="cancel">
      </div>
      </div>
    </form>
