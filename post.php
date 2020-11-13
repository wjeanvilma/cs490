<?php
 session_start();
  date_default_timezone_set("America/New_york");
  $server = "127.0.0.1";
  $user = "root";
  $password = "";
  $dbName = "testDB";
  $date = strval(date("M d, Y h:i:s a "));
  echo $date;
  $announcement = $_POST['announcement'];
  $userID = $_SESSION['userID'];

  $conn = mysqli_connect($server, $user, $password, $dbName);
  if (!$conn){
    echo "Not connected to server";
} 

if(!mysqli_select_db($conn, $dbName)){
   echo "Database not selected";
} 

if (($_FILES['file']['name']!=NULL)){
    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    
        if($fileError===0){
            if($fileSize<500000){
                $NewfileName = $userID.".". uniqid('', true).".".$fileActualExt;
                $fileDestination ='uploads/'.$NewfileName;  
                move_uploaded_file($fileTmpName, $fileDestination);

                $sql = "INSERT INTO announcements (announcement, userID, documentLocation, time_stamp) values ('".$announcement."', '".$userID."', '".$NewfileName."', '".$date."')"; 
                $result = mysqli_query($conn, $sql);

            } else {
                echo '
                <script>
                window.alert("You file is too big!");
                </script>';
            }
        } else {
            echo '
        <script>
        window.alert("There was an error, please try again!");
        </script>';
        }

} else {

    $sql = "INSERT INTO announcements (announcement, userID, time_stamp) values ('".$announcement."', '".$userID."', '".$date."')"; 
    $result = mysqli_query($conn, $sql);
    
}

header("refresh:0.1; url=Home.php");
exit();

?>