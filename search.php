<head>
<link rel="stylesheet" href="search.css"/>
</head>

<?php
session_start();
include_once "header.php";
 
  $server = "127.0.0.1";
  $user = "root";
  $password = "";
  $dbName = "testDB";

  $conn = mysqli_connect($server, $user, $password, $dbName);
                
                  $search = $_POST['search'];
                   
                 if($search=='all'){
                    $sql = "SELECT * FROM users";
                } else {
                    $sql = "SELECT * FROM users WHERE username LIKE '%".$search."%' order by username";
                }

              $result = mysqli_query($conn, $sql);
              $count = mysqli_num_rows($result);

              if(!$result){
                echo 
                '<script>
                   window.alert("There was an error");
                   window.location="Home.php";
                </script>';
              } 
              if(mysqli_num_rows($result)==null){
                  
                echo 
                '<script>
                   window.alert("No Result found");
                   window.location = "Home.php";
                </script>';
                
            } 
            else {
                while ($row = mysqli_fetch_array($result)) {                    
                        // Calling the Function
                        display($row['username'], $row['fullName'], $row['email'] );     
                      }                               
              }             
            
          ?>
<?php function display($username, $fullName, $email) { ?>
<div class="row container" onclick="getSelectedUser('<?php echo $username; ?>')" >
        
    
    <div class="from-inline" >
    <div class="col">
        <h6> <a href="userPosts.php"> <?php echo $username; ?> </a></h6>
        <h6>  <?php echo $fullName; ?> </h6>
        <h6>  <?php echo $email; ?> </h6>
    </div>
        <form method="POST" action="message.php">
        <input type="submit" value="Send message" class="btn btn-primary">
        </form>
        
    </div>
</div>
<hr><br>

<?php } ?>

<script>
function getSelectedUser(selected) {
    let user = selected;
    $.ajax({
        url: "search.php",
        method: "POST",
        data: {
            user: user
        },
        success: function(res) {
          console.log(user);
        }
    });
}
</script>
  <?php 
  if(isset($_POST['user'])){
    $_SESSION['search'] = $_POST['user'];
  }
 ?>
