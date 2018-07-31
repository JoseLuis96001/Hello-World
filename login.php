<?php 
	include("config.php");
	session_start();

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$miuser = mysqli_real_escape_string($con,$_POST['user']);
     	$mipass = mysqli_real_escape_string($con,$_POST['pass']); 

	    $sql ="SELECT email,password FROM users WHERE usuario='$miuser' AND password='$mipass'";
	    $result = mysqli_query($con,$sql);
	    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	    $active = $row['active'];

	    $count = mysqli_num_rows($result);

	    if($count == 1) {
		    $_SESSION['login_user'] = $miuser;
	        header("location: welcome.php");//welcome.php
        }
        else {
        	$error = "Su usuario o contraseña es invalida";
        }

	}
 ?>

<html>

 	<head>
		<title>Página de ingreso</title>
	</head>
	<body>
		<h1>Escriba correctamente sus datos para ingresar</h1>
			<form method="post" action="">
				<fieldset>
					<div>
						<label>Usuario:</label>
						<input type="text" name="user">
					</div><br />
					<div>
						<label>Contraseña:</label>
						<input type="password" name="pass">
					</div><br />
					<div>
						<input type="submit" value="Ingresar">
					</div>
				</fieldset>	
			</form>
	</body>

   <!-- Formulario pro de internet -->
   <head>
      <title>Login Page</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "user" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "pass" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>

               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
               	
            </div>
				
         </div>
			
      </div>

   </body>
   
</html>