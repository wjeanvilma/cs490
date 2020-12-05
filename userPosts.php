<?php

session_start();
include_once "header.php";

                    $server = "127.0.0.1";
                    $user = "root";
                    $password = "";
                    $dbName = "testDB";

                    $conn = mysqli_connect($server, $user, $password, $dbName);
              
                    $announcementQuery = "Select * from announcements join users on announcements.userID=users.userID where username ='".$_SESSION['selected']."' order by time_stamp DESC"; 
                    $annoucementResult = mysqli_query($conn, $announcementQuery);
                   
                    while ($aRow = mysqli_fetch_array($annoucementResult)){ 
                    
                    //$commentQuery = "Select * from announcements a, comments c where a.announcementID=c.announcementID AND a.announcementID = ".$aRow['announcementID']." order by timestamp DESC";
                    //$commentResult = mysqli_query($conn, $commentQuery);
                    //$num_of_comments = mysqli_num_rows($commentResult);

                    //$num_of_comments = mysqli_num_rows($commentResult);
  
                    // displayAnnoucement($aRow['username'], $aRow['announcement'], $aRow['likes'], $aRow['announcementID'], $num_of_comments, $aRow['documentLocation']); 
                    
                    if ($aRow["documentLocation"] == NULL){
                        echo'
                    <div class="card w-75 card-body post" >
                    <p style="display:none;" class="announcementID">'.$aRow["announcementID"].'</p>
                        <p> <b>'.$aRow["username"].'</b> </p>
                        <p class="card-text">'.$aRow["announcement"].'</p> 
                        
                        <p class="card-text">'.date("M d, Y h:i a ", strtotime($aRow["time_stamp"])).'</p> 
                    </div>
                    <br>';
                        } else {
                    
                    echo'  
                    <div  class="card w-75 card-body post">
                    <p style="display:none;" class="announcementID">'.$aRow["announcementID"].'</p>
                        <p> <b>'.$aRow["username"].'</b> </p>
                        <p class="card-text">'.$aRow["announcement"].'</p>
                        <img src="uploads/'.$aRow["documentLocation"].'">
                        <br> 
                        <p class="card-text">'.date("M d, Y h:i a ", strtotime($aRow["time_stamp"])).'</p>        
                    </div>
                    <br>
                    ';
                        }
                   
              }
        
     ?>