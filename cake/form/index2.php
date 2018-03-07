<?php 
include "connect.php";
session_start();
if(isset($_POST['sub'])){
	    //$username=$_POST['username'];
        $email=$_POST['email'];
		$username=$_POST['username'];
		$password=$_POST['password'];
        $qry= "select * from `register` where `email`='$email' and `password`='$password'; ";
		$res=mysqli_query($conn,$qry);
        if(mysqli_num_rows($res)>0) {
                $row=mysqli_fetch_assoc($res);
                $_SESSION['email']=$row['email'];
				$_SESSION['username']=$row['username'];
				
             header("Location: websites.php");
	    }else{
		   echo "<script type='text/javascript'>alert('please signup');</script>";
		}
}
if(isset($_POST['submit'])){
        $username=$_POST['username'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$repassword=$_POST['repassword'];
		if($password=$repassword){
              $qry= "select * from `register` where `email`='$email';";
			  $res=mysqli_query($conn,$qry);
              if(mysqli_fetch_array($res)>0)  {
				     $row=mysqli_fetch_assoc($res);
				     $_SESSION['username']=$row['username'];
                     echo '<script type="text/javascript">alert("email already exists")</script>';
              } else {
                 $qry = "INSERT INTO `register` (`username`,`email`, `password`) VALUES ('$username','$email','$password');";
                 $res=mysqli_query($conn,$qry);
                  if($res){
                      echo '<script type="text/javascript">alert("successfully registered")</script>';
					  header('location:websites.php');
				  }
			  }
		}
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Login and Registration Form with HTML5 and CSS3</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
    </head>
    <body>
        <div class="container">
            <!-- Codrops top bar -->
            <section>				
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action=" "  method ="post" autocomplete="on"> 
                                <h1>Log in</h1> 
								<p> 
                                    <label for="usernamesignup" class="uname" data-icon="u">Your username</label>
                                    <input id="usernamesignup" name="username" required="required" type="text" placeholder="mysuperusername690" />
                                </p>
                                <p> 
                                    <label for="email" class="uname" data-icon="e" > Your email</label>
                                    <input id="email" name="email" required="required" type="text" placeholder="mymail@mail.com"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Your password </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" /> 
                                </p>
                                <p class="keeplogin"> 
									<input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> 
									<label for="loginkeeping">Keep me logged in</label>
								</p>
                                <p class="login button"> 
                                    <input type="submit" name="sub"  value="Login" /> 
								</p>
                                <p class="change_link">
									Not a member yet ?
									<a href="#toregister" class="to_register">Join us</a>
								</p>
                            </form>
                        </div>

                        <div id="register" class="animate form">
                            <form  action=" "  method="post" autocomplete="on"> 
                                <h1> Sign up </h1> 
                                <p> 
                                    <label for="usernamesignup" class="uname" data-icon="u">Your username</label>
                                    <input id="usernamesignup" name="username" required="required" type="text" placeholder="mysuperusername690" />
                                </p>
                                <p> 
                                    <label for="emailsignup" class="youmail" data-icon="e" > Your email</label>
                                    <input id="emailsignup" name="email" required="required" type="email" placeholder="mysupermail@mail.com"/> 
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="p">Your password </label>
                                    <input id="passwordsignup" name="password" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                </p>
                                <p> 
                                    <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Please confirm your password </label>
                                    <input id="passwordsignup_confirm" name="repassword" required="required" type="password" placeholder="eg. X8df!90EO"/>
									<span id="confirmMessage" class="confirmMessage"></span>
                                </p>
                                <p class="signin button"> 
									<input type="submit" name="submit" value="Sign up"/> 
								</p>
                                <p class="change_link">  
									Already a member ?
									<a href="#tologin" class="to_register"> Go and log in </a>
								</p>
                            </form>
                        </div>
						
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>


<script>

function ValidateEmail(emailsignup) 
{
 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(myForm.emailAddr.value))
  {
    return (true)
  }
    alert("You have entered an invalid email address!")
    return (false)
}



function checkPass()
{

    var pass1 = document.getElementById('passwordsignup');
    var pass2 = document.getElementById('passwordsignup_confirm');
    var message = document.getElementById('confirmMessage ');
    if(passwordsignup.value == passwordsignup_confirm.value){
        message.innerHTML = "Passwords Match!"
    }else{
        message.innerHTML = "Passwords Do Not Match!"
    }
}  

</script>