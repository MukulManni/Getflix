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
                 <div id='upload'><center><p><a href='user.php'>Home</a></p></center></div>
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
            <div style="margin-top: 5px;">
            <form action="#" method="post" enctype="multipart/form-data">
            <input type="text" name="title" id="titlebox" placeholder="Enter Video Title"><br>
            <input id="uploadbox" name="uploadvideo" type="file" hidden/>
            <label for="uploadbox" class="ubutton">Select Video</label>
            <input type="submit" style="border: 0px;" class="ubutton" name="submit" value="Upload"><br>
            </form>
            
            <?php
            if(isset($_POST["submit"])){
                $target_dir = "Videos/";
                                
                $target_file = $target_dir.basename($_FILES["uploadvideo"]["name"]);
                
                if(move_uploaded_file($_FILES["uploadvideo"]["tmp_name"], $target_file)){
                mysqli_query($con,"INSERT INTO videos VALUE('".$_POST["title"]."', '".$target_file."', '".$fname." ".$lname."')");
                echo "Uploaded";
                }
                else {
                echo "There was an error";
                }
                }
            ?>
            </div>
        </center>
        
        <style>
        
        ::placeholder {
	           color: black;
               opacity: 1;
        }
        
        .ubutton {
               padding: 3px;
               
               color: black;
               
               background-color: #e50914;
               
               font-size: 16px;
               font-family: 'Source Sans Pro', sans-serif;
               border-radius: 0.3rem;
               
               cursor: pointer;
        }
        
        #titlebox {
            margin: 10px;
            margin-top:40px;
            font-size:15px;
            
        }
        
        </style>
</body>
</html>
