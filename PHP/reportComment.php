<?php 
include ('connection.php');
session_start();
$uname = $_SESSION['ID'];
if(!$_SESSION['username']){
    header("Location: home.php");
}
if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['sub'] )
{
    $query1 = 'INSERT INTO reports_comment VALUES(NULL, \'' . $uname . '\' , \'' . $_GET['ID'] . '\', \'' .$_POST['contact'] . '\';';
    $result1 = mysqli_query($con, $query1);
}
if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['cancel'])
{
    header("Location: home.php");
}
?>
<!DOCTYPE html>
<html>
   <head>
   	<title>Report Post</title>
   </head>
<form id="reportC" action="reportComment.php" method="post">
  <p>Why are you reporting this comment?</p>
  <div>
    <input type="radio" id="contactChoice1"
     name="contact" value="0" checked>
    <label for="contactChoice1">Spam/Duplicate</label>

    <input type="radio" id="contactChoice2"
     name="contact" value="1">
    <label for="contactChoice2">Hate Speech/Violence</label>

    <input type="radio" id="contactChoice3"
     name="contact" value="2">
    <label for="contactChoice3">Inappropriate Content</label>

    <input type="radio" id="contactChoice2"
     name="contact" value="3">
    <label for="contactChoice2">Self-Injury</label>

    <input type="radio" id="contactChoice2"
     name="contact" value="4">
    <label for="contactChoice2">Private Information</label>

    <input type="radio" id="contactChoice2"
     name="contact" value="5">
    <label for="contactChoice2">Underage Children</label>
  </div>
  <div>
    <button type="submit" name="sub">Submit</button>
    <input type="Submit" value="Cancel" name="cancel">
  </div>
</form>
</html>