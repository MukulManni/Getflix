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
        
        <?php
            session_start();
            $fname = $_SESSION["fname"];
            $lname = $_SESSION["lname"];
                        
            echo "<div id='user'><center><div id='email'><center><p>".$fname." ".$lname."</p></center></div>
                 <div id='upload'><center><p><a href='upload.php'>Upload</a></p></center></div>
                 </center></div>
            ";
        ?>
        
        <style>
            #user {
                position: absolute;
                top: 16px;
                right: 10px;
                
                width: 100px;
            }
        
            #email {
                background-color: rgba(33, 33, 33, 1);
                color: white;
    
                font-family: 'Source Sans Pro', sans-serif;
            }
            
            #upload {
                height: 22px;
                width: 57px;
    
                background-color: #e50914;
    
                font-family: 'Source Sans Pro', sans-serif;
            }
        </style>
        
        <center>
        
            <form action="#" method="post">
            <input id="searchbox" name="searched" type="text" placeholder="Search videos here...">
            <input type="submit" value="Go" id="go">
            </form>
            
        </center>
        
        <div style="margin:auto; width:95%; margin-top:15px;">
            <?php
            $searched = $_POST["searched"];
            
            if($searched == ""){
                $fetchVideos = mysqli_query($con,"SELECT * FROM videos");
                
                while($row = mysqli_fetch_assoc($fetchVideos)){
                
                $title = $row['v_title'];
                $address = $row['v_address'];
                $author = $row['v_author'];
                
                echo "<div class='videodiv' style='width:24%'>
                    <video src='".$address."' controls width='100%' height='300px'></video> 
                    <center><p style='color:#e8ebed; margin-top:5px;'>Title: ".$title."</p></center>
                    <center><p style='color:#e8ebed; margin-top:5px;'>Author: ".$author."</p></center>
                    </div>";
               }}
               
             else{
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
                        But <a href='https://www.youtube.com/results?search_query=".$searched."' target='_blank' style='color:red;'><u>here</u></a> are some search results from YouTube.
                        </font>
                    </div></center>
                    ";
                    }
                
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
























