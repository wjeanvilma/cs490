<?php session_start();?>
<?php include "getAllAnn.php" ?>
<html>
    <head>
        <title>Home</title>
        <link rel="stylesheet" href="home.css?version=3" />
    </head>
    <body>
        <?php include "header.php" ?>
        <div class="home-body">        
        <div id="postBox">
            <form action = "post.php" method = "post">
                <textarea name="announcement"  cols="60" rows="5" placeholder="Write a post here!"></textarea>
                <br><br>
                <input type="file" id="upload_file" accept="image/*, .pdf">
                <button class="btn btn-secondary postBt" type="submit" value = "Post" name="post">Post</button>
            </form>
        </div>
        <!--MAYBE ADD TABS SO THAT YOU HAVE 'FRIENDS ANNOUNCEMENTS' AND THEN YOU CAN TAB OVER TO 'ALL ANNOUNCEMENTS'?-->
        <div id="container" class="container">
            <h2>Announcements</h2>
            <?php 
                displayAnn(); 
            ?>
            <!-- Announcement Layout (Now how do we have it show multiple? infinite scroll?)
                username date
                post
                like and comment buttons
            -->

            <script>
            function getAnnID(id){
                  console.log(id);
                }
                
            </script>
        </div>
        </div>
    </body>
</html>