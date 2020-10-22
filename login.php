<?php
 include_once "index.html";
?>

<?php
//$server = "localhost";
//$user = "u191982321_jwd";
//$password = "Jwd490123";
//$dbName = "u191982321_jwd490";
  $server = "127.0.0.1";
  $user = "root";
  $password = "";
  $dbName = "testDB";

  $conn = mysqli_connect($server, $user, $password, $dbName);

 if (!$conn){
     echo "Not connected to server";
 } 
 if(!mysqli_select_db($conn, $dbName)){
	echo "Database not selected";
} 

$username = $_POST["username"];
$pword = $_POST["password"];

 $sql = "Select * from users where username ='".$username."'";
 
 $result = mysqli_query($conn, $sql);

 if(mysqli_num_rows($result)==1){

    $row = mysqli_fetch_assoc($result);
    $userID = $row['userID'];
    $hashed_password = $row['password'];

    if(password_verify($pword, $hashed_password)){

    session_start();
    $_SESSION['logged'] = true;
    $_SESSION['username'] = $username;
    $_SESSION['userID'] = $userID;
    
    header("Location: Home.php");
    
    } else {
      echo 
     '<script>
        document.getElementById("status").innerHTML = "Incorrect Username or Password";
      </script>';
      
  }

}


?>