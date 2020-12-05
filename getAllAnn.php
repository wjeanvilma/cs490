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
                        $commentQuery = "Select * from announcements a, comments c where a.announcementID=c.announcementID AND a.announcementID = ".$aRow['announcementID']." order by time_stamp DESC";
                        $commentResult = mysqli_query($conn, $commentQuery);
                        $num_of_comments = mysqli_num_rows($commentResult);

                        echo'
                        <div class="card card-body post">
                    <p style="display:none;" class="announcementID">'.$aRow["announcementID"].'</p>
                        <p> <b>'.$aRow["username"].'</b> </p>
                        <p class="card-text">'.$aRow["announcement"].'</p>
                        ';
                        if ($aRow["documentLocation"] != NULL){
                            echo'<img src="uploads/'.$aRow["documentLocation"].'">';
                        }
                        echo'
                        
                        <br> 
                        <p class="card-text">'.date("M d, Y h:i a ", strtotime($aRow["time_stamp"])).'</p>     
                        <div class="form-inline">         
                            <input style="margin-right:8px;" class="likeBt" onclick="likeBt('.$aRow["announcementID"].')" type="button" value="👍🏽">
                            <h6 class="likes">'.$aRow["likes"].' likes</h6>
                            <p id="commentBT" style="margin-left:15px;" type="submit">💬</p>
                            <h6 style="margin-left:8px;" class="likes"> '.$num_of_comments.' Comments</h6>
                        </div>   
                    </div>
                    <form action="comment.php" method="post">
                        <input type="text" id="annoucement'.$aRow["announcementID"].'" name="comment" class="comment"> 
                        <input class="commentBt" type="button" value="comment" onclick="getAnnID('.$aRow["announcementID"].')">
                    </form>';

                    
                        
                    while ($cRow = mysqli_fetch_array($commentResult)){ 
                        
                    echo' 
                    <div style="margin-left:25px;">
                        <p><b>'.$cRow["username"].': </b> '.$cRow["comment"].'</p>
                    </div>';
                    
                    }

                   
              }
              
        }
     ?>