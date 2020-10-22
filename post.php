<?php
 session_start();

  $server = "127.0.0.1";
  $user = "root";
  $password = "";
  $dbName = "testDB";

  $announcement = $_POST['announcement'];
  $userID = $_SESSION['userID'];

  $conn = mysqli_connect($server, $user, $password, $dbName);

if (!$conn){
    echo "Not connected to server";
} 
if(!mysqli_select_db($conn, $dbName)){
   echo "Database not selected";
} 


 $sql = "INSERT INTO announcements (announcement, userID) values ('".$announcement."', '".$userID."')"; 

$result = mysqli_query($conn, $sql);

if (!$result){
    
    echo "<h2 align='center'>There was an error, Please try again!</h2>";
    
} 

header("refresh:1; url=Home.php");
exit();

?>