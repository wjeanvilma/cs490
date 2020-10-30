<?php
function displayAnn(){
//     $server = "localhost";
// $user = "u191982321_jwd";
// $password = "Jwd490123";
// $dbName = "u191982321_jwd490";
                    $server = "127.0.0.1";
                    $user = "root";
                    $password = "";
                    $dbName = "testDB";
                    $conn = mysqli_connect($server, $user, $password, $dbName);
              
                    $announcementQuery = "Select * from announcements a, users u where a.userID=u.userID  order by timestamp DESC"; 
                    $annoucementResult = mysqli_query($conn, $announcementQuery);
                   
                    while ($aRow = mysqli_fetch_array($annoucementResult)){ 
                    
                        echo'
                    <form action="comment.php" method="post">
                    <div class="card card-body post" >
                    <p style="display:none;" class="announcementID">'.$aRow["announcementID"].'</p>
                        <p> <b>'.$aRow["username"].'</b> </p>
                        <p class="card-text">'.$aRow["announcement"].'</p>      
                    </div>
                        <input type="text"> 
                        <input class="commentBt" type="button" value="comment" onclick="getAnnID('.$aRow["announcementID"].')">
                    </form><br>';

                    $commentQuery = "Select * from announcements a, comments c where a.announcementID=c.announcementID AND a.announcementID = ".$aRow['announcementID']." order by timestamp DESC";
                    $commentResult = mysqli_query($conn, $commentQuery);
                    $num_of_comments = mysqli_num_rows($commentResult);

                    while ($cRow = mysqli_fetch_array($commentResult)){ 

                    echo'                  
                    
                        <p> <b>'.$cRow["username"].'</b> </p>
                        <p class="card-text">'.$cRow["comment"].'</p>      
                    <br>';
                        

                    //$num_of_comments = mysqli_num_rows($commentResult);
  
                    // displayAnnoucement($aRow['username'], $aRow['announcement'], $aRow['likes'], $aRow['announcementID'], $num_of_comments, $aRow['documentLocation']); 

                    }
                   
              }
        }
     ?>