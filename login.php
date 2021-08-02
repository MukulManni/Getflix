<!DOCTYPE html>

<?php
    include "config.php";
?>

<html>
<head>
		<title>Sign In</title>
		<link rel="stylesheet" href="signup.css">
		<link rel="icon" href="index.jpeg" type="image/icon type">
		
		<link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400&display=swap" rel="stylesheet"> 
	</head>

<body >

        <center><h1 id="title">Getflix</h1></center>
		
		<hr noshade>
		
		<font color="white"><p id="question">Not yet a member?</p></font>
		<div id="signuplogo"><center><p><a href="signup.php">Sign Up</a></p></center></div>
    
        <center><h1 style="margin-top:25px; color:grey; font-family: 'Source Sans Pro', sans-serif;">Sign In</h1></center>
    
        <center>
        <div id="signupform">
        
        <form action="#" method="post">
        <input type="text" name="email" placeholder="Username or Email" class="signupvalues"><br>
        <input type="password" name="password" placeholder="Password" class="signupvalues"><br>
        <input type="submit" value="Sign In" class="submitbutton">
        </form>
        </div>
        </center>
        
        <?php
           $test = mysqli_query($con,"SELECT * FROM users");
           $check = 0;
           $pass = $_POST["password"];
           $email = $_POST["email"];
           
           if($pass != "" and $email != ""){
           while($row = mysqli_fetch_assoc($test)){
                if($pass == $row["password"] and $email == $row["email"]){
                    $check = 0;
                    
                    session_start();
                    
                    $_SESSION["fname"] = $row["fname"];
                    $_SESSION["lname"] = $row["lname"];
                    $_SESSION["email"] = $row["email"];
                    $_SESSION["password"] = $row["password"];
                    
                    header("Location: user.php");
                    exit();
                }
                
                else{
                    $check = 1;
                    
                }
           }
           
           if($check == 1){
                echo "<center><p id='passerror'>Incorrect Email or Password...</p></center>";
           }}
        ?>
        
        <style>
		    #passerror {
		        margin-top: 10px;
		        font-family: 'Source Sans Pro', sans-serif;
		        color:white;
		    }
		</style>
</body>
</html>
