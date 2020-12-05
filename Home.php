<?php session_start();?>
<?php include "getAllAnn.php" ?>
<html>
    <head>
        <title>Home</title>
        <link rel="stylesheet" href="home.css?version=11" />
    </head>
    <body>
        <?php include "header.php" ?>
        <div class="home-body">        
        <div id="postBox">
            <form action = "post.php" method = "post" enctype="multipart/form-data">
                <textarea name="announcement"  cols="60" rows="5" required placeholder="Write a post here!"></textarea>
                <br><br>
                <input name="file" type="file" id="upload_file" accept="image/*">
                <button class="btn btn-secondary postBt" type="submit" id="post" value = "Post" name="post">Post</button>
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
                let announcementID = id;
                let comment = $("#annoucement"+id).val();
                $.ajax({
                url: "comment.php",
                method: "POST",
                data: {
                    announcementID: id,
                    comment: comment
                },
                success: function(res) {
                    location.reload();
                }
                });
            }

            function likeBt(id){
                let announcementID = id;
                console.log(announcementID);
                $.ajax({
        url: "like.php",
        method: "POST",
        data : { 
            announcementID: id,
           
        },
        success: function(res) { 
            location.reload();
            }
        });
     }
    
            </script>
        </div>
        </div>
    </body>
</html>