<?php 
session_start();

// $server = "localhost";
//     $user = "u191982321_jeelioonline";
//     $password = "Jeelio123";
//     $dbName = "u191982321_thisDB";

    $server = "127.0.0.1";
$user = "root";
$password = "";
$dbName = "testDB";
$conn = mysqli_connect($server, $user, $password, $dbName);

$actualTable = $_SESSION['actualTable'];

if (!$conn){
  echo "Not connected to server";
} 
if(!mysqli_select_db($conn, $dbName)){
 echo "Database not selected";
}      
            $message = $_POST['Message']; 
            $username = $_SESSION['username'];    
            $sql =  "INSERT INTO ".$actualTable." (message, username) VALUES ('".$message."', '".$username."')";
            $result = mysqli_query($conn, $sql);
            
?>