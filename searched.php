<?php
     include "config.php";
?>

<html>
    <head>
        <title>Getflix</title>
        <link rel="icon" href="index.jpeg" type="image/icon type">
        <link rel="stylesheet" href="style.css">
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400&display=swap" rel="stylesheet"> 
    </head>
    
    <body>
        <center><h1 id="title">Getflix</h1></center>
        
        <hr noshade>
        
        <div id="signuplogo"><center><p><a href="signup.php">Sign Up</a></p></center></div>
        
        <center>
        
            <form action="searched.php" method="post">
            <input id="searchbox" name="searched" type="text" placeholder="Search videos here...">
            <input type="submit" value="Go" id="go">
            </form>
            
        </center>
        
        <div style="margin:auto; width:95%; margin-top:15px;">
            <?php
                
                $searched = $_POST["searched"];
                $check = 0;
            
                $fetchVideos = mysqli_query($con,"SELECT * FROM videos WHERE v_title LIKE '%".$searched."%'");
                
                while($row = mysqli_fetch_assoc($fetchVideos)){
                
                $check = 1;
                $title = $row['v_title'];
                $address = $row['v_address'];
                $author = $row['v_author'];
                
                echo "<div class='videodiv' style='width:24%'>
                    <video src='".$address."' controls width='100%' height='300px'></video> 
                    <center><p style='color:#e8ebed; margin-top:5px;'>Title: ".$title."</p></center>
                    <center><p style='color:#e8ebed; margin-top:5px;'>Author: ".$author."</p></center>
                    </div>";
               }
               
               if(!mysqli_fetch_assoc($fetchVideos) and $check==0){
                    echo "<center><div style='margin-top: 25px;'>
                        <font color='white'>Oops!!! We don't find any relevent video to the search...
                        <br>
                        But <a style='color:red;' href='https://www.youtube.com/results?search_query=".$searched."' target='_blank'><u>here</u></a> are some search results from YouTube.
                        </font>
                    </div></center>
                    ";
                }
            ?>
        </div>
        
        <style>
            .videodiv {
            float: left;
            margin-right: 8px;
             }
        </style>
        
    </body>
</html>
























