<?php
	include "connect.php";
    session_start();
    if(!isset($_SESSION['email']))
            header('index2.php');	

	if(isset($_POST['sub'])){
        $email=$_SESSION['email'];
		$username=$_SESSION['username'];
        $qry="select * from `websites` where `username`='$username';";
		
        $res=mysqli_query($conn,$qry);
		echo "<table border='0'>
         <tr>
			<th>website </th>
			<th>username  </th>
			<th>password </th>
		</tr>";
			while ($row=mysqli_fetch_array($res)){
				echo "<tr>";
                echo "<td>" . $row['website'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
				echo "<td>" . $row['password'] . "</td>";
                echo "</tr>";
            }
             echo "</table>";
			mysqli_free_result($res);
			//echo "<script type='text/javascript'>alert('please login');</script>";
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
                                <h1>Websites</h1> 
                                <p class="login button"> 
                                    <input type="submit" name="sub"  value="Details" /> 
						            
								</p>
								<p class="change_link">
								 <a href="index2.php" class="to_register"> LOGIN</a>
								<a href="upload.php" class="to_register"> UPLOAD</a>
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