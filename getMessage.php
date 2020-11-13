<?php 
//function getAndDisplayMessages(){ 
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

$sql = "select * from ".$_SESSION['actualTable']."";
$messagesResult = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($messagesResult)){
if($row["username"] == $_SESSION['username']){
    
    echo '   
     <div class="row myMessage w-75">
     <div style="background-color:whitesmoke;" class="col">
       <h6> <b id="username"> Me </b></h6>                 
         <p class="card-text commentText">'.$row["message"].'</p>              
     </div>
     </div>
     <br>
     ';
     
} else {
    echo '
    <div class="row otherMessage w-75">
     <div style="background-color:lightblue;" class="col">
       <h6> <b id="username"> '.$row["username"].' </b></h6>                 
         <p class="card-text commentText">'.$row["message"].'</p>              
     </div>      
     </div>
     <br>
     ';
  }
  
 }

?>


