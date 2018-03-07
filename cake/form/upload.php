<?php
include "connect.php";
session_start();
if(!isset($_SESSION['email']))
            header('index2.php');
if(isset($_POST['sub'])){
        $website=$_POST['website'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		//$_SESSION['username']=$row['username'];
		$qry="select `username`,`website` from `websites` where `username`='$username' and `website`='$website';";
        $res=mysqli_query($conn,$qry);
		 //$_SESSION['email']=$row['email'];
        if($result=mysqli_fetch_array($res))  {
            $m = "Success";
            echo "already exists";
        }
        else {
          $qry = "INSERT INTO `websites` ( `website`, `password`, `username`) VALUES ('$website', '$password','$username' );";
          mysqli_query($conn,$qry) ;
		  //echo ""<script type='text/javascript'>alert('Successfully  uploaded');</script>";";
		  echo "<script type='text/javascript'>alert('Successfully uploaded');</script>";
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
        <meta name="author" content="Codrops"/>
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style2.css" />
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
                                <h1>UPLOAD 	</h1> 
								<p> 
                                    <label for="username" class="uname" data-icon="u">Your username</label>
                                    <input id="username" name="username" required="required" type="text" placeholder="mysuperusername690" />
                                </p>
                                <p> 
                                    <label for="email" class="uname" data-icon="w" > Website</label>
                                    <input id="email" name="website" required="required" type="text" placeholder="mywebsite"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Your password </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" /> 
                                </p>
                                <p class="login button"> 
                                    <input type="submit" name="sub"  value="upload" /> 
								</p>
								</p>
								<p class="change_link">
								<a href="index2.php" class="to_register"> LOGOUT </a>
								</p>
							</form>
						</div>
					</div>
                </div>
            </section>
        </div>
    </body>
</html>	