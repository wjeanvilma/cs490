<?php

session_start();
include_once "header.php";

                    $server = "127.0.0.1";
                    $user = "root";
                    $password = "";
                    $dbName = "testDB";

                    $conn = mysqli_connect($server, $user, $password, $dbName);
              
                    $announcementQuery = "Select * from announcements join users on announcements.userID=users.userID where username ='".$_SESSION['search']."' order by timestamp DESC"; 
                    $annoucementResult = mysqli_query($conn, $announcementQuery);
                   
                    while ($aRow = mysqli_fetch_array($annoucementResult)){ 
                    
                    //$commentQuery = "Select * from announcements a, comments c where a.announcementID=c.announcementID AND a.announcementID = ".$aRow['announcementID']." order by timestamp DESC";
                    //$commentResult = mysqli_query($conn, $commentQuery);
                    //$num_of_comments = mysqli_num_rows($commentResult);

                    //$num_of_comments = mysqli_num_rows($commentResult);
  
                    // displayAnnoucement($aRow['username'], $aRow['announcement'], $aRow['likes'], $aRow['announcementID'], $num_of_comments, $aRow['documentLocation']); 
                    
                    echo '
                    <div style="margin-left:5%; margin-right:5%;" class="card card-body posts">
                        <p> <b>'.$aRow["username"].'</b> </p>
                        <p class="card-text">'.$aRow["announcement"].'</p>
                    </div><br>';
                   
              }
        
     ?>