<?php
session_start();
include "header.php";

$_SESSION['title'] = "Chat";
?>

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
    <h5>Chattin with, <?php echo $_SESSION['selected'] ?></h5>

    <div class="message-div card w-75" id="message-div">
        <div class="card-body">
            <div id="messageDiv">
            </div>
            <div class="messageForm">
                <form class="messageForm">
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