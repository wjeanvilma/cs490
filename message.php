<?php
session_start();
include "header.php";

$_SESSION['title'] = "Chat";
?>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="message.css?version=89" />
</head>
<?php
//     $server = "localhost";
// $user = "u191982321_jwd";
// $password = "Jwd490123";
// $dbName = "u191982321_jwd490";
$server = "127.0.0.1";
$user = "root";
$password = "";
$dbName = "testDB";
$conn = mysqli_connect($server, $user, $password, $dbName);
        
     $myTableName = $_SESSION['username'].$_SESSION['selected'];
     $otherTableName = $_SESSION['selected'].$_SESSION['username'];

     $chek = mysqli_query($conn, "SHOW TABLES LIKE '".$otherTableName."' ");
   
    if(mysqli_num_rows($chek)>=1){
        $actualTable = $otherTableName;  
       
    } 
    else {
    $actualTable = $myTableName;
        
    $createTable = "CREATE TABLE IF NOT EXISTS ".$actualTable."( 
        messageID int(11) AUTO_INCREMENT, 
        username varchar(50) NOT NULL, 
        message varchar(5000),
        PRIMARY KEY (messageID)
    );";
        $result = mysqli_query($conn, $createTable);                  
}

        $_SESSION['actualTable'] = $actualTable;
       
?>

<div>
<h5 class="chat-with w-75">Chattin with, <?php echo $_SESSION['selected'] ?></h5><br>

    <div class="message-div card w-75" id="message-div">
        <div class="card-body">
            <div id="messageDiv">

            </div>
            <div class="messageForm">
                <form class="row">
                    <input class="messageInput" type="text" id="message" name="Message"
                        placeholder="Type your message here" required>
                    <input type="button" id="send"
                        class="btn btn-secondary sendMessage" value="Send">
                </form>
            </div>
        </div>
    </div>

    <script>
    $("#message-div").animate({
        scrollTop: 10000
    }, 800);    

    $('#send').click(function(){
        Message = document.getElementById('message').value;
        if(Message.trim()!=""){
        $.ajax({
            url: "sendMessage.php",
            method: "POST",
            data: {
                Message: Message
            },
            success: function(res) {
                
            }
        });
     }
     document.getElementById('message').value="";
    });
    
    setInterval(function() {
        $('#messageDiv').load("getMessage.php").fadeIn("slow");
    }, 100);
    </script>

</div>