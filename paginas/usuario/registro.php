
<?php include_once '../../lib.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registro</title>
</head>
<body>

	<?php
	if (hayErrores()) {
		mostrarErrores();

		if(isset($_SESSION['POST'])){
			echo "\$_POST: ".json_encode($_SESSION['POST']);
			unset($_SESSION['POST']);
		}
	}?>

	<form action="../../acciones/usuario/registro.php" method="POST">
			<p>
				<label for="nombre">nombre</label>
				<input type="text" name="nombre">
			</p>
			<p>
				<label for="apellido">apellidos</label>
				<input type="text" name="apellido">
			</p>
			<p>
				<label for="nick">nick</label>
				<input type="text" name="nick">
			</p>
			<p>
				<label for="email">email</label>
				<input type="email" name="email">
			</p>
			<p>
				<label for="pass">Contraseña</label>
				<input type="password" name="pass">
			</p>
			<p>
				<label for="pass2">Confirme contraseña</label>
				<input type="password" name="pass2">
			</p>
			<input type="submit" value="Registrarse">
	</form>
</body>
</html>