<!DOCTYPE html>

<?php
    include "config.php";
?>

<html>
	<head>
		<title>Sign Up</title>
		<link rel="stylesheet" href="signup.css">
		<link rel="icon" href="index.jpeg" type="image/icon type">
		
		<link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400&display=swap" rel="stylesheet"> 
        
	</head>
	
	<body>
		<center><h1 id="title">Getflix</h1></center>
		
		<hr noshade>
		
		<font color="white"><p id="question">Already a member?</p></font>
		<div id="signuplogo"><center><p><a href="login.php">Sign In</a></p></center></div>
		
		<center>
		
		<h1 style="margin-top:25px; color:grey; font-family: 'Source Sans Pro', sans-serif;">Create a new Account</h1>
		
		<div id="signupform">
		<form method="post" action="#">
		
		<input type="text" class="signupvalues" name="fname" placeholder="First Name" required><br>
		<input type="text" class="signupvalues" name="lname" placeholder="Last Name" required><br>
		<input type="text" class="signupvalues" name="email" placeholder="Username or Email" required><br>
		
		<input type="password" class="signupvalues" name="pass1" placeholder="Password" required><br>
		<input type="password" class="signupvalues" name="pass2" placeholder="Retype Password" required><br>
 
        <input type="submit" value="Sign Up" class="submitbutton">
	
		</form>
		</div>
		</center>
		
		<?php
		    $pass1 = $_POST["pass1"];
		    $pass2 = $_POST["pass2"];
		    $fname = $_POST["fname"];
		    $lname = $_POST["lname"];
		    $email = $_POST["email"];		    
		 
		 if($pass1!="" and $pass2!=""){
		 
		    if($pass1 == $pass2){
		        $test = mysqli_query($con,"SELECT * FROM users");
		        
		        $check = 0;
		        
		        while($row = mysqli_fetch_assoc($test)){
		            if($row["email"]==$_POST["email"]){
		                $check = 1;
		                break;
		            }
		        }
		    
		        if($check==1){
		            echo "<center><p id='passerror'>Username or Email already exist...<br>Please Login</p></center>";
		        }
		        
		        else{
		        mysqli_query($con,"INSERT INTO users VALUES('".$email."', '".$fname."', '".$lname."', '".$pass1."')");
		        
		        session_start();
                    
                    $_SESSION["fname"] = $fname;
                    $_SESSION["lname"] = $lname;
                    $_SESSION["email"] = $email;
                    $_SESSION["password"] = $pass1;
		        
		        header("Location: user.php");
                exit();
                }
		    }
		    
		    else{
		        echo "<center><p id='passerror'>Password do not match...</p></center>";
		    }
		    }
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
