<?php 
include_once '../../lib.php';
session_start();
if(hayErrores()){
	mostrarErrores();
}
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Login</title>
 </head>
 <body>
 	<form action="../../acciones/usuario/login.php" method="POST">
 		<p>
			<label for="email">email</label>
 			<input type="text" name="email">
 		</p>
 		<p>
			<label for="pass">password</label>
 			<input type="password" name="pass">
 		</p>
		<input type="submit" value="Login">

 		
 	</form>
 	
 </body>
 </html>