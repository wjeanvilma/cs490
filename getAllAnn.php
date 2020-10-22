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
                    
                    //$commentQuery = "Select * from announcements a, comments c where a.announcementID=c.announcementID AND a.announcementID = ".$aRow['announcementID']." order by timestamp DESC";
                    //$commentResult = mysqli_query($conn, $commentQuery);
                    //$num_of_comments = mysqli_num_rows($commentResult);

                    //$num_of_comments = mysqli_num_rows($commentResult);
  
                    // displayAnnoucement($aRow['username'], $aRow['announcement'], $aRow['likes'], $aRow['announcementID'], $num_of_comments, $aRow['documentLocation']); 

                    echo'
                    <form action="comment.php" method="post">
                    <div class="card card-body post">
                        <p> <b>'.$aRow["username"].'</b> </p>
                        <p class="card-text">'.$aRow["announcement"].'</p>      
                    </div>
                        <input type="text"> 
                        <input type="submit" value="comment">
                    </form><br>';
                   
              }
        }
     ?>