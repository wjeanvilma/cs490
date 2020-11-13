<?php
function displayAnn(){
    date_default_timezone_set("America/New_york");
//$server = "localhost";
// $user = "u191982321_jwd";
// $password = "Jwd490123";
// $dbName = "u191982321_jwd490";
                    $server = "127.0.0.1";
                    $user = "root";
                    $password = "";
                    $dbName = "testDB";
                    $conn = mysqli_connect($server, $user, $password, $dbName);
              
                    $announcementQuery = "Select * from announcements a, users u where a.userID=u.userID  order by time_stamp DESC"; 
                    $annoucementResult = mysqli_query($conn, $announcementQuery);
                   
                    while ($aRow = mysqli_fetch_array($annoucementResult)){ 
                    
                        if ($aRow["documentLocation"] == NULL){
                        echo'
                    <form action="comment.php" method="post">
                    <div class="card card-body post" >
                    <p style="display:none;" class="announcementID">'.$aRow["announcementID"].'</p>
                        <p> <b>'.$aRow["username"].'</b> </p>
                        <p class="card-text">'.$aRow["announcement"].'</p> 
                        <p class="card-text">'.date("M d, Y h:i a ", strtotime($aRow["time_stamp"])).'</p> 
                    </div>
                    <input type="text" id="annoucement'.$aRow["announcementID"].'" name="comment" class="comment"> 
                        <input class="commentBt" type="button" value="comment" onclick="getAnnID('.$aRow["announcementID"].')">
                    </form>';
                        } else {
                    
                    echo'  
                    <div class="card card-body post">
                    <p style="display:none;" class="announcementID">'.$aRow["announcementID"].'</p>
                        <p> <b>'.$aRow["username"].'</b> </p>
                        <p class="card-text">'.$aRow["announcement"].'</p>
                        <img src="uploads/'.$aRow["documentLocation"].'">
                        <br> 
                        <p class="card-text">'.date("M d, Y h:i a ", strtotime($aRow["time_stamp"])).'</p>        
                    </div>
                    <form action="comment.php" method="post">
                        <input type="text" id="annoucement'.$aRow["announcementID"].'" name="comment" class="comment"> 
                        <input class="commentBt" type="button" value="comment" onclick="getAnnID('.$aRow["announcementID"].')">
                    </form>';
                        } 

                    $commentQuery = "Select * from announcements a, comments c where a.announcementID=c.announcementID AND a.announcementID = ".$aRow['announcementID']." order by time_stamp DESC";
                    $commentResult = mysqli_query($conn, $commentQuery);
                    $num_of_comments = mysqli_num_rows($commentResult);

                    while ($cRow = mysqli_fetch_array($commentResult)){ 
                
                    echo' 
                    <div style="margin-left:25px;">
                        <p><b>'.$cRow["username"].': </b> '.$cRow["comment"].'</p>
                    </div>';
                    
                    }

                   
              }
              
        }
     ?>