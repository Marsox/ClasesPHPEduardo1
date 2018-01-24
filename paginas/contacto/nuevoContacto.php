<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>NUevo Contacto</title>
</head>
<body>
	<form action="../../acciones/contacto/crear.php" method="POST">
		<p>
			<label for="nombre"> nombre </label>
			<input type="text" name="nombre">
		</p>
		<p>
			<label for="apellido"> apellido </label>
			<input type="text" name="apellido">
		</p>
		<p>
			<label for="telefono"> telefono </label>
			<input type="text" name="telefono">
		</p>
		<p>
			<label for="email"> email </label>
			<input type="email" name="email">
		</p>
		<p>
			<label for="direccion"> direccion </label>
			<input type="text" name="direccion">
		</p>
		<p>
			<label for="categoria"> categoria </label>
			<input type="text" name="categoria">
		</p>
		<input type="submit" value="Crear">
	</form>
</body>
</html>