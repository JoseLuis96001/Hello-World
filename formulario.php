<!DOCTYPE html>
<meta charset='UTF-8'>
<html lang="en">
 <?php 

  $con=mysqli_connect('localhost','root','','nuevos') or die ('Error ');
 ?>
<html>
 <head>
 	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

 	<title>PHP & MYSQL</title>
 </head>

 <body>
 	<div class="container">
		<h1>Proyecto X</h1>
		<h2>Ingresa tus datos para el registro</h2>
		<br>
	 	<form method='POST' action='formulario.php' class="form-horizontal">

	 		<div class="form-group">
		 		<label class="control-label">Nombre:</label>
		 		<input type='text' name='nombre' placeholder='Escriba su nombre' class='form-control form-control-lg'>	
	 		</div>
	 		
	 		<div class="form-group">
	 			<label class='control-label'>Contraseña:</label>
	 			<input type='password' name='passw' placeholder='Escriba su contraseña' class='form-control form-control-lg'>
	 		</div>

			<div class="form-group">
	 			<label class='control-label'>Email:</label>
	 			<input type='text' name='email' placeholder='Escriba su email' class='form-control form-control-lg'>
			</div>

			<div class="form-group">
	 			<label class='control-label'>Colegio:</label>
	 			<input type='text' name='colegio' placeholder='Escriba el nombre de su colegio' class='form-control form-control-lg'>
			</div>

			<div class="form-group">
	 			<label class='control-label'>Ciudad:</label>
	 			<input type='text' name='ciudad' placeholder='Escriba el nombre de su ciudad' class='form-control form-control-lg'>
			</div>

			<div class="form-group">
	 			<label class='control-label'>Fecha de nacimiento:</label>
	 			<input type='text' name='nacimiento' placeholder='yyyy/mm/dd' class='form-control form-control-lg'>
			</div>

			<tr>
               <td>Género:</td>
               <td>
                  <input type = "radio" name = "genero" value = "femenino">Femenino
                  <input type = "radio" name = "genero" value = "masculino">Masculino
               </td>
            </tr>
            <br>

	 		<input type='submit' name='insert' value='INSERTAR DATOS' class="btn btn-primary">
	 	</form>
	</div>
	

 	<?php 
 	 if(isset($_POST['insert'])){
 	 	$usuario= $_POST['nombre'];
 	 	$pass= $_POST['passw'];
 	 	$email= $_POST['email'];
 	 	$colegio= $_POST['colegio'];
 	 	$ciudad= $_POST['ciudad'];
 	 	$nacimiento= $_POST['nacimiento'];
 	 	$fechaBD = date("Y-m-d", strtotime($nacimiento));
 	 	$genero= $_POST['genero'];

 	 	$insertar="INSERT INTO users (usuario,password,email,colegio,ciudad,nacimiento,genero) VALUES ('$usuario','$pass','$email','$colegio','$ciudad','$fechaBD','$genero')";

 	 	$ejecutar= mysqli_query($con,$insertar);

 	 	if ($ejecutar) {	
 	 		echo "<h3><br>Insertado correctamente";
 	 		
 	 	}
 	 }
 	 ?>

 	 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
 </body>
</html>
