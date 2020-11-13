<?php
 session_start();

  $server = "127.0.0.1";
  $user = "root";
  $password = "";
  $dbName = "testDB";

  $comment = $_POST['comment'];
  $username = $_SESSION['username'];
  $announcementID = $_POST['announcementID'];

  $conn = mysqli_connect($server, $user, $password, $dbName);

if (!$conn){
    echo "Not connected to server";
} 

if(!mysqli_select_db($conn, $dbName)){
   echo "Database not selected";
} 

 $sql = "INSERT INTO comments (comment, username, announcementID) values ('".$comment."', '".$username."', '".$announcementID."')"; 

$result = mysqli_query($conn, $sql);

if (!$result){
    
    echo "<h2 align='center'>There was an error, Please try again!</h2>";
    
} 

?>