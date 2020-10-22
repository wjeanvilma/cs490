<?php
    include_once "signup.html";
?>

<?php
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
$fullName = $_POST["fullName"];
$email = $_POST["email"];
$uname = $_POST["username"];
$pword = $_POST["password"];
$cPword = $_POST["cPassword"];

 $sql = "Select * from users where username ='".$uname."' limit 1";
 
 $result = mysqli_query($conn, $sql);

 if(mysqli_num_rows($result)==1){

    echo 
     '<script>
        document.getElementById("status").innerHTML = "Username is taken, Try again!";
      </script>';

}
else {
    
    $hashed_password = password_hash($pword, PASSWORD_DEFAULT);

    if (strlen($pword)<6){
        echo 
        '<script>
           document.getElementById("status").innerHTML = "Password needs to be at least 6 characters!";
         </script>';
     }
     
     else if($cPword!=$pword){
            echo 
            '<script>
               document.getElementById("status").innerHTML = "Passwords do not match!";
             </script>';
    } else {

        $result = mysqli_query($conn, "INSERT INTO users (fullName, email, username, password) values ('".$fullName."', '".$email."', '".$uname."', '".$hashed_password."')");
        
        if (!$result){
            echo 
        '<script>
            document.getElementById("status").innerHTML = "There was an error, please try again!";
        </script>';
        } else {
            header("Location: index.html");
        } 
     
    }   

}

?>