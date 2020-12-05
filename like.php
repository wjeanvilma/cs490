<?php
 session_start();

  //$server = "localhost";
//$user = "u191982321_jwd";
//$password = "Jwd490123";
//$dbName = "u191982321_jwd490";
$server = "127.0.0.1";
$user = "root";
$password = "";
$dbName = "testDB";

  $username = $_SESSION['username'];
  $announcementID = $_POST['announcementID'];

  $conn = mysqli_connect($server, $user, $password, $dbName);

if (!$conn){
    echo "Not connected to server";
} 

if(!mysqli_select_db($conn, $dbName)){
   echo "Database not selected";
} 

 $sql = "Select * from announcements where announcementID = '".$announcementID."'"; 
 $result = mysqli_query($conn, $sql);
 $row = mysqli_fetch_array($result);
 $updatedValue = $row['likes'] + 1;
 

 $update="update announcements set likes = '".$updatedValue."' where announcementID = '".$announcementID."'";
 $likePostStatus = mysqli_query($conn, $update);
 if (!$likePostStatus){
    
    echo "<h2 align='center'>There was an error, Please try again!</h2>";
    
} 

if (!$result){  
    echo "<h2 align='center'>There was an error, Please try again!</h2>";  
} 

?>
